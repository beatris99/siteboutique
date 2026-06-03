<?php

namespace App\Console\Commands;

use App\Support\TemplateRequirementResolver;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateStarterKit extends Command
{
    protected $signature = 'starter-kit:generate {templateSlug} {clientName?}';

    protected $description = 'Generate a production starter kit for a client site.';

    public function handle(): int
    {
        $templateSlug = $this->argument('templateSlug');
        $clientName = $this->argument('clientName') ?: 'Client nou';

        $kit = config("starter_kits.$templateSlug");

        if (!$kit) {
            $this->error("Template-ul [$templateSlug] nu există în config/starter_kits.php.");

            return self::FAILURE;
        }

        $folderName = now()->format('Y-m-d') . '-' . Str::slug($clientName) . '-' . $templateSlug;
        $path = storage_path("app/starter-kits/$folderName");

        File::ensureDirectoryExists($path);

        File::put($path . '/brief-client.md', $this->briefClient($clientName, $kit));
        File::put($path . '/checklist-productie.md', $this->productionChecklist($kit));
        File::put($path . '/materiale-necesare.md', $this->requiredMaterials($templateSlug));
        File::put($path . '/oferta-draft.md', $this->offerDraft($clientName, $kit));

        $this->info('Starter kit generat cu succes:');
        $this->line($path);

        return self::SUCCESS;
    }

    private function briefClient(string $clientName, array $kit): string
    {
        $pages = collect($kit['recommended_pages'])
            ->map(fn ($page) => "- $page")
            ->implode(PHP_EOL);

        return <<<MD
# Brief client - {$clientName}

## Template ales

{$kit['name']}

## Tip business

{$kit['type']}

## Pagini / secțiuni recomandate

{$pages}

## Date client

- Nume business:
- Persoană contact:
- Telefon:
- Email:
- Website existent:
- Domeniu cumpărat:
- Social media:

## Obiectiv site

- Prezentare:
- Lead-uri:
- Rezervări:
- Vânzări:
- Alt obiectiv:

## Observații

-
MD;
    }

    private function productionChecklist(array $kit): string
    {
        $pages = collect($kit['recommended_pages'])
            ->map(fn ($page) => "- [ ] $page")
            ->implode(PHP_EOL);

        return <<<MD
# Checklist producție - {$kit['name']}

## Setup

- [ ] Creează proiect / branch client
- [ ] Copiază template-ul ales
- [ ] Configurează numele brandului
- [ ] Configurează culorile
- [ ] Configurează fonturile, dacă este cazul
- [ ] Adaugă logo
- [ ] Adaugă favicon

## Pagini / secțiuni

{$pages}

## Conținut

- [ ] Texte reale
- [ ] Servicii / produse reale
- [ ] Prețuri reale
- [ ] Poze reale
- [ ] Recenzii reale
- [ ] Date contact
- [ ] Linkuri social media

## Tehnic

- [ ] Formular contact testat
- [ ] Email testat
- [ ] Responsive testat
- [ ] Build producție
- [ ] SEO title / description
- [ ] Sitemap
- [ ] Robots.txt
- [ ] Politici legale
- [ ] SSL
- [ ] Analytics / Search Console, dacă se cere

## Lansare

- [ ] Domeniu conectat
- [ ] Hosting configurat
- [ ] APP_DEBUG=false
- [ ] Cache Laravel
- [ ] Test final formular
- [ ] Test final mobil
MD;
    }

    private function requiredMaterials(string $templateSlug): string
    {
        $requirements = collect(
            TemplateRequirementResolver::requirements(new \App\Models\Lead([
                'source_page' => "/templates/$templateSlug",
            ]))
        )
            ->map(fn ($item) => "- [ ] $item")
            ->implode(PHP_EOL);

        return <<<MD
# Materiale necesare

{$requirements}
MD;
    }

    private function offerDraft(string $clientName, array $kit): string
    {
        return <<<MD
# Ofertă draft - {$clientName}

Bună,

Pentru proiectul tău, propun să pornim de la template-ul {$kit['name']}, potrivit pentru: {$kit['type']}.

## Include

- Adaptare template pentru business
- Design responsive
- Structură clară
- Formular contact / cerere
- SEO basic
- Pregătire pentru lansare

## Preț

Estimare: ______ lei

## Termen

Estimare: ______ zile lucrătoare

## Pentru oferta finală am nevoie de materialele din fișierul materiale-necesare.md.

Mulțumesc,
SiteBoutique
MD;
    }
}
