<?php
class Hello
{
	public $message;

	public function __construct($string = 'hola mundo feliz')
	{
		$this->message = 'hola '.$string;
	}

	public function salute()
	{
		return $this->message;
	}
}
