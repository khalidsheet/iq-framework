<?php 

namespace IqFramework\Controllers;

use App\Models\User;
use Request;
use Validator;

class HomeController {

	public function home()
	{
		$pageTitle = 'Tests';
		$names = [
			'name' => ['khalid'],
			'age' => ['ayat']
		];
		return view('index', compact('names', 'pageTitles'));
		
	}
}