<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/** Ejemplo de captura de la salida estándar
 */
class OutputTest extends TestCase
{
	public function testOutput(){
		$this->expectOutputString('hola mundo');
		print 'hola mundo feliz';
	}
}
