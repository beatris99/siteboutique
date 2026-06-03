<?php

namespace App\Support;

use App\Models\Lead;
use Illuminate\Support\Str;

class TemplateRequirementResolver
{
    public static function slugFromLead(Lead $lead): ?string
    {
        if ($lead->source_page && preg_match('#/templates/([^/?]+)#', $lead->source_page, $matches)) {
            return $matches[1];
        }

        if ($lead->selected_template) {
            return Str::slug($lead->selected_template);
        }

        return null;
    }

    public static function requirements(Lead $lead): array
    {
        $slug = self::slugFromLead($lead);

        return self::requirementsBySlug()[$slug] ?? [
            'Numele afacerii',
            'Logo, dacă există',
            'Culori preferate',
            'Texte sau descriere business',
            'Poze, dacă există',
            'Servicii / produse',
            'Date de contact',
            'Linkuri social media',
        ];
    }

    public static function canCustomize(): array
    {
        return [
            'Numele afacerii',
            'Culorile brandului',
            'Logo-ul',
            'Textele',
            'Imaginile',
            'Serviciile / produsele',
            'Prețurile',
            'Datele de contact',
            'Formularul',
            'Buton WhatsApp',
            'Domeniul propriu',
        ];
    }

    public static function notIncluded(): array
    {
        return [
            'Logo profesional, dacă nu se stabilește separat',
            'Ședință foto profesională',
            'Texte copywriting avansate',
            'Reclame Google Ads / Facebook Ads',
            'Mentenanță lunară',
            'Domeniu și hosting, dacă nu se stabilesc separat',
            'Administrare conținut complexă, dacă nu este aleasă ca funcționalitate',
        ];
    }

    private static function requirementsBySlug(): array
    {
        return [
            'premium-studio' => [
                'Numele salonului sau brandului',
                'Logo, dacă există',
                'Culori preferate',
                'Lista serviciilor',
                'Prețuri sau intervale de preț',
                'Poze reale cu salonul / lucrările',
                'Program de lucru',
                'Telefon și WhatsApp',
                'Adresă și link Google Maps',
                'Linkuri social media',
            ],

            'business-essence' => [
                'Numele firmei',
                'Domeniul de activitate',
                'Lista serviciilor',
                'Descriere scurtă pentru fiecare serviciu',
                'Zone acoperite',
                'Beneficii / diferențiatori',
                'Procesul de lucru',
                'Recenzii, dacă există',
                'Telefon, email și WhatsApp',
                'Adresă sau zonă de activitate',
            ],

            'rental-flow' => [
                'Ce produse / vehicule închiriezi',
                'Poze reale cu produsele',
                'Tarife pe zi / săptămână / lună',
                'Garanție',
                'Acte necesare',
                'Condiții de predare și returnare',
                'Ce este inclus în preț',
                'Locație de predare',
                'Program de lucru',
                'Telefon și WhatsApp',
            ],

            'tourism-stay' => [
                'Numele locației',
                'Poze reale cu camerele / locația',
                'Tipuri de camere sau unități',
                'Prețuri pe noapte',
                'Facilități',
                'Reguli check-in / check-out',
                'Politică avans / anulare',
                'Atracții în apropiere',
                'Adresă și hartă',
                'Telefon și WhatsApp',
            ],

            'simple-shop' => [
                'Numele brandului',
                'Logo, dacă există',
                'Categorii de produse',
                'Lista produselor',
                'Poze produse',
                'Prețuri',
                'Descrieri produse',
                'Stoc sau disponibilitate',
                'Metodă de comandă',
                'Telefon, email și WhatsApp',
            ],

            'conversion-flow' => [
                'Ce vinzi sau promovezi',
                'Pentru cine este oferta',
                'Beneficiile principale',
                'Preț sau condiții ofertă',
                'Testimoniale / rezultate, dacă există',
                'Bonusuri, dacă există',
                'Întrebări frecvente',
                'CTA principal',
                'Date contact',
                'Linkuri pentru tracking / ads, dacă există',
            ],
        ];
    }
}
