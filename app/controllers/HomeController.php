<?php 

namespace IqFramework\Controllers;

use App\Models\User;
use Request;
use Validator;
use Session;
use Cookie;

class HomeController {

	public function home()
	{
		$str = explode(' ', 'k h a l i d');
		$results = [];

		foreach($str as $char) {
			$results[] = [
				'char' => $char,
				'hex'  => bin2hex($char)
			];
		}

		return toJson([
			'hex for khalid' => bin2hex('khalid'),
			'each char' => $results
		]);
	}

	public function test()
	{
		$cookie = new Cookie;

		return toJson($cookie->all());
	}
}