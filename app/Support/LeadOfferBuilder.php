<?php

namespace App\Support;

use App\Models\Lead;

class LeadOfferBuilder
{
    public function build(Lead $lead): string
    {
        $features = $this->formatList($lead->selected_features ?? []);
        $requirements = $this->formatList(TemplateRequirementResolver::requirements($lead));
        $notIncluded = $this->formatList(TemplateRequirementResolver::notIncluded());

        $estimatedPrice = number_format((int) $lead->total_price, 0, ',', '.') . ' lei';

        return <<<TEXT
Bună, {$lead->name},

Mulțumesc pentru cerere. Am analizat configurația trimisă prin SiteBoutique și îți las mai jos o estimare inițială pentru proiect.

CONFIGURAȚIE ALEASĂ

Template: {$this->value($lead->selected_template)}
Categorie: {$this->value($lead->selected_category_label)}
Pachet: {$this->value($lead->selected_package_name)}
Preț estimativ: {$estimatedPrice}

Extra-uri selectate:
{$features}

DETALII PROIECT

Tip business: {$this->value($lead->business_type)}
Buget aproximativ: {$this->value($lead->budget_range)}
Urgență: {$this->value($lead->urgency)}
Deadline dorit: {$this->value($lead->launch_deadline?->format('d.m.Y'))}
Are logo: {$this->yesNo($lead->has_logo)}
Are poze: {$this->yesNo($lead->has_photos)}
Are domeniu: {$this->yesNo($lead->has_domain)}

CE INCLUDE DIRECȚIA ACEASTA

- Adaptarea template-ului ales pentru afacerea ta
- Structură responsive pentru telefon, tabletă și desktop
- Secțiuni adaptate pentru servicii / produse / ofertă
- Formular de contact sau cerere
- SEO basic: titluri, descrieri și structură clară
- Pregătire pentru lansare

PENTRU OFERTA FINALĂ AM NEVOIE DE:

{$requirements}

NU ESTE INCLUS AUTOMAT:

{$notIncluded}

Prețul de mai sus este estimativ. Oferta finală se stabilește după ce verific materialele, complexitatea conținutului și funcționalitățile exacte.

Dacă ești de acord cu direcția, îmi poți trimite materialele disponibile, iar eu revin cu oferta finală și termenul de livrare.

Mulțumesc,
SiteBoutique
TEXT;
    }

    private function value(?string $value): string
    {
        return $value ?: 'Nespecificat';
    }

    private function yesNo(?bool $value): string
    {
        if (is_null($value)) {
            return 'Nespecificat';
        }

        return $value ? 'Da' : 'Nu';
    }

    private function formatList(array $items): string
    {
        if (empty($items)) {
            return '- Fără / nespecificat';
        }

        return collect($items)
            ->map(fn ($item) => '- ' . $item)
            ->implode(PHP_EOL);
    }
}
