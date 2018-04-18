<?php 

namespace IqFramework\Controllers;

use IqFramework\BaseController\Controller;

use Request;


class HomeController extends Controller {

	public function home()
	{

		return "
			<center><h1>Home Page</h1></center>
		";
				
	}

}
