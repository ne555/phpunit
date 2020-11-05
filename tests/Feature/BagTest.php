<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Bag;

class BagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

	# Test function for Box class
	public function testBoxContents()
	{
		$bag = new Bag(['toy']);
		$this->assertTrue($bag->has('toy'));
		$this->assertFalse($bag->has('ball'));
	}


    public function testTakeOneFromTheBox()
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

	public function testHola()
	{
		$response = $this->get('/bonjour');
        $response->assertStatus(200);
		$response->assertSee('hola');
		$response->assertDontSee('asdf');
	}
}
