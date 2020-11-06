<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Bag;

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

	/**
	 * @depends testConstruct
	 * @dataProvider containsProvider
	 * note: primero los argumentos del provider, después de los producers
	 */
	public function testContains($letter, $count, $bag)
	{
		//$bag = $this->construct();
		$this->assertCount($count, $bag->startsWith($letter));
	}

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
