<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchTest extends TestCase
{
    public function testIndexUrl()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSearchUrl()
    {
        $response = $this->get('/onix');

        $response->assertStatus(200);
    }

    public function testValidSearch()
    {
        $response = $this->get('/onix');

        $response
            ->assertStatus(200)
            ->assertSeeText('Habilidades')
            ->assertDontSeeText('No hay pokémones para la búsqueda');
    }

    public function testValidPartialSearch()
    {
        $response = $this->get('/char');

        $response
            ->assertStatus(200)
            ->assertSeeText('Habilidades')
            ->assertDontSeeText('No hay pokémones para la búsqueda');
    }

    public function testInvalidSearch()
    {
        $response = $this->get('/alf');

        $response
            ->assertStatus(200)
            ->assertDontSeeText('Habilidades')
            ->assertSeeText('No hay pokémones para la búsqueda');
    }
}
