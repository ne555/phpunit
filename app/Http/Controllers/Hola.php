<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hola extends Controller
{
	function hello_world()
	{
		return view('hello_world');
	}
}
