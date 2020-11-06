<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HolaTest extends TestCase
{
	/**
	 * Prueba del redireccionamiento de routes/web.php
	 */
    public function testRutaBonjour()
    {
        $response = $this->get('/bonjour');
        $response->assertStatus(200);
    }
}
