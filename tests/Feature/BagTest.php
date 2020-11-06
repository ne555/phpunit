<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Bag;

class BagTest extends TestCase
{
	# Test functions for Bag class


	public function testBagConstructor()
	{
		$bag = new Bag(['toy']);
		$this->assertInstanceOf(Bag::class, $bag);
		return $bag; //es un «provider» para otras pruebas
	}

	public function testBagContents()
	{
		$bag = new Bag(['toy']);
		$this->assertTrue($bag->has('toy'));
		$this->assertFalse($bag->has('ball'));
	}


    public function testTakeOneFromTheBag()
    {
        $bag = new Bag(['torch']);
        $this->assertEquals('torch', $bag->takeOne());

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
