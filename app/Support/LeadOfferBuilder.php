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

        $requestType = $lead->request_type === 'developer_template'
            ? 'Cumpărare template pentru developer'
            : 'Site făcut și adaptat pentru client';

        return <<<TEXT
Bună, {$lead->name},

Mulțumesc pentru cerere. Am văzut modelul ales și funcționalitățile selectate.

CE VARIANTĂ AI ALES

{$requestType}

CONFIGURAȚIE

Model site: {$this->value($lead->selected_template)}
Pachet: {$this->value($lead->selected_package_name)}
Preț estimativ: {$estimatedPrice}

Funcționalități extra:
{$features}

DETALII DESPRE PROIECT

Ce vrei să facă site-ul: {$this->value($lead->site_goal)}
Tip afacere: {$this->value($lead->business_type)}
Buget aproximativ: {$this->value($lead->budget_range)}
Cât de urgent este: {$this->value($lead->urgency)}
Dată limită: {$this->value($lead->launch_deadline?->format('d.m.Y'))}
Ai logo: {$this->yesNo($lead->has_logo)}
Ai poze: {$this->yesNo($lead->has_photos)}
Ai domeniu: {$this->yesNo($lead->has_domain)}

CE INCLUDE DIRECȚIA ACEASTA

- Modelul de site ales
- Adaptare pentru telefon, tabletă și desktop
- Structură clară pentru afacerea ta
- Formular sau buton de contact
- Setări Google de bază
- Pregătire pentru lansare

PENTRU OFERTA FINALĂ AM NEVOIE DE:

{$requirements}

NU ESTE INCLUS AUTOMAT:

{$notIncluded}

Prețul de mai sus este estimativ. Oferta finală se stabilește după ce verific materialele, textele, imaginile și funcționalitățile exacte.

Dacă ești de acord cu direcția, îmi poți trimite materialele disponibile, iar eu revin cu oferta finală și termenul de livrare.

Mulțumesc,
SiteGo
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
            ->map(fn($item) => '- ' . $item)
            ->implode(PHP_EOL);
    }
}
