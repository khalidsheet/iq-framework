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
		$session = new Session('test_');

		return $session->get('name');

		return toJson($session->all());

	}

	public function test()
	{
		$cookie = new Cookie;

		return toJson($cookie->all());
	}
}