<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Bag;

/** Uso de dependencias en las pruebas
 */
class DependencyTest extends TestCase
{
	public function testEmpty()
	{
		$bag = new Bag();
		$this->assertEmpty($bag->retrieveItems());

		return $bag;
	}

	/**
	 * @depends testEmpty
	 */
	public function testTakeOneNull($bag)
	{
		$oneless = $bag->takeOne();
		$this->assertNull($oneless);
		return $oneless;
	}

	/**
	 * @depends testEmpty
	 * @depends testTakeOneNull
	 */
	public function testKeepNull($bag, $nullArray)
	{
		$this->assertCount(0, $bag->retrieveItems());
		$this->assertNull($nullArray);
	}

	/** «Producer» para otros tests
	 */
	public function testConstruct()
	{
		$bag = new Bag([
			'a','ab','ac',
			'b','bb',
			'c',
			'e'
		]);
		$this->assertInstanceOf(Bag::class, $bag);
		return $bag;
	}

	/** Ejemplo de proveedor y dependencia
	 * nota: primero los argumentos del provider, después de los producers (depends)
	 * @depends testConstruct
	 * @dataProvider containsProvider
	 */
	public function testContains($letter, $count, $bag)
	{
		$this->assertCount($count, $bag->startsWith($letter));
	}

	/** Etiquetado de los casos de prueba
	 */
	public function containsProvider(): array
	{
		return [
			'a' => ['a', 3],
			'b' => ['b', 2],
			'c' => ['c', 1],
			'd=0: nada' => ['d', 10],
			'e' => ['e', 1]
		];
	}
}
