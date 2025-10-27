<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class RoutesTest extends TestCase
{
    /** Routes qui doivent répondre 200 directement */
    public static function okRoutes(): array
    {
        return [
            ['/'],
            ['/crew'],
            ['/technology'],
            ['/destinations/moon'], // page détail OK directe
        ];
    }

    #[DataProvider('okRoutes')]
    public function test_ok_routes_respond_200(string $uri): void
    {
        $this->get($uri)->assertOk();
    }

    /** L’index des destinations peut rediriger (302) vers une planète -> on l’accepte */
    public function test_destinations_index_may_redirect_then_ok(): void
    {
        $resp = $this->get('/destinations');
        $resp->assertRedirect(); // 301/302 accepté

        // Puis on suit la redirection et on s’attend à 200
        $this->followingRedirects()->get('/destinations')->assertOk();
    }

    /** Commutateur de langue EN -> redirige, puis la home répond 200 */
    public function test_lang_switch_to_en_then_home_ok(): void
    {
        $this->get('/lang/en')->assertStatus(302);
        $this->followingRedirects()->get('/')->assertOk();
    }

    /** Commutateur de langue FR -> redirige, puis la home répond 200 */
    public function test_lang_switch_to_fr_then_home_ok(): void
    {
        $this->get('/lang/fr')->assertStatus(302);
        $this->followingRedirects()->get('/')->assertOk();
    }
}
