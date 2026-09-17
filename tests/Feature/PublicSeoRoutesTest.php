<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicSeoRoutesTest extends TestCase
{
    public function test_canonical_public_pages_are_available(): void
    {
        foreach ([
            '/',
            '/creare-site-web',
            '/realizare-site-uri',
            '/preturi',
            '/mentenanta-site',
            '/landing-page',
            '/site-pentru-salon',
            '/web-design-brasov',
            '/cat-costa-un-site-2026',
            '/portofoliu',
            '/contact',
        ] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('SiteGo');
        }
    }

    public function test_removed_service_pages_redirect_to_the_canonical_service_page(): void
    {
        foreach ([
            '/site-de-prezentare',
            '/magazin-online',
            '/site-cu-rezervari',
            '/dezvoltare-web-personalizata',
        ] as $path) {
            $this->get($path)
                ->assertStatus(301)
                ->assertRedirect('/realizare-site-uri');
        }
    }

    public function test_legacy_seo_urls_redirect_to_current_canonical_pages(): void
    {
        $redirects = [
            '/realizare-website-brasov' => '/web-design-brasov',
            '/realizare-site-brasov' => '/web-design-brasov',
            '/creare-site-brasov' => '/web-design-brasov',
            '/constructie-site-brasov' => '/web-design-brasov',
            '/firma-web-design-brasov' => '/web-design-brasov',
            '/agentie-web-design-brasov' => '/web-design-brasov',
            '/creare-site-de-prezentare-brasov' => '/realizare-site-uri',
            '/site-inchirieri-brasov' => '/realizare-site-uri',
            '/magazin-online-brasov' => '/realizare-site-uri',
            '/landing-page-afaceri' => '/landing-page',
            '/site-salon-beauty' => '/site-pentru-salon',
            '/cat-costa-un-site-de-prezentare-2026' => '/cat-costa-un-site-2026',
        ];

        foreach ($redirects as $from => $to) {
            $this->get($from)
                ->assertStatus(301)
                ->assertRedirect($to);
        }
    }

    public function test_portfolio_routes_are_available(): void
    {
        foreach ([
            '/portofoliu/rentride',
            '/portofoliu/access-bars-beatris',
            '/portofoliu/happiness-atelier',
        ] as $path) {
            $this->get($path)->assertOk();
        }

        $this->get('/portofoliu/sitego')
            ->assertStatus(301)
            ->assertRedirect('/portofoliu');
    }

    public function test_sitemap_contains_canonical_pages_and_excludes_legacy_urls(): void
    {
        $response = $this->get('/sitemap.xml')->assertOk();

        foreach ([
            'https://sitego.ro/creare-site-web',
            'https://sitego.ro/realizare-site-uri',
            'https://sitego.ro/preturi',
            'https://sitego.ro/mentenanta-site',
            'https://sitego.ro/portofoliu/happiness-atelier',
        ] as $url) {
            $response->assertSee($url, false);
        }

        foreach ([
            'https://sitego.ro/site-de-prezentare',
            'https://sitego.ro/magazin-online',
            'https://sitego.ro/site-cu-rezervari',
            'https://sitego.ro/dezvoltare-web-personalizata',
            'https://sitego.ro/creare-site-brasov',
        ] as $legacyUrl) {
            $response->assertDontSee($legacyUrl, false);
        }
    }

    public function test_pricing_page_uses_configured_prices(): void
    {
        config([
            'sitego-pricing.packages.start' => 3210,
            'sitego-pricing.maintenance.essential' => 410,
            'sitego-pricing.currency_label' => 'lei',
        ]);

        $this->get('/preturi')
            ->assertOk()
            ->assertSee('3.210', false)
            ->assertSee('410', false);
    }

    public function test_robots_exposes_sitemap_and_blocks_admin_paths(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertSee('User-agent: *', false)
            ->assertSee('Disallow: /admin', false)
            ->assertSee('Sitemap: https://sitego.ro/sitemap.xml', false);
    }
}
