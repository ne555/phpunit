<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Bag;

class BagTest extends TestCase
{
	# Test functions for Bag class


	/** Prueba constructor
	 */
	public function testBagConstructor()
	{
		$bag = new Bag(['toy']);
		$this->assertInstanceOf(Bag::class, $bag);
		return $bag; //es un «provider» para otras pruebas
	}

	/** Prueba el contenido almacenado
	 * @depends testBagConstructor
	 */
	public function testBagContents($bag)
	{
		$this->assertTrue($bag->has('toy'));
		$this->assertFalse($bag->has('ball'));
	}


	/** Prueba obtener elementos
	 * @depends testBagConstructor
	 */
    public function testTakeOneFromTheBag($bag)
    {
        $this->assertEquals('toy', $bag->takeOne());

        // Null, now the bag is empty
        $this->assertNull($bag->takeOne());
        $this->assertNull($bag->takeOne());
    }
	

    public function testStartsWithALetter()
    {
        $bag = new Bag(['', '', 'toy', 'torch', 'ball', 'cat', 'tissue']);

        $results = $bag->startsWith('t');

        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        $this->assertEmpty($bag->startsWith('s'));
    }
}
