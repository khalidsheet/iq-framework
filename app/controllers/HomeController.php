<?php 

namespace IqFramework\Controllers;

use App\Models\User;
use Request;
use Validator;

class HomeController {

	public function home()
	{

		return toJson($_SERVER);
		
	}
}