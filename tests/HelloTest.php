<?php
//require_once 'Hello.php'
//require_once 'PHPUnit/Framework.php'
use PHPUnit\Framework\TestCase; //namespace

//class HelloTest extends PHPUnit_Framework_Testcase
class HelloTest extends Testcase
{
	public function testCreation()
	{
		$object = new Hello();
		$this->assertInstanceOf('Hello', $object);
	}

	public function testSalute()
	{
		$object = new Hello('hola');
		$string = $object->salute();
		$this->assertEquals('hola', $string);
	}
}
