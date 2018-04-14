<?php 

$class_aliases = [


	/*
	 * This Place created for you to let you rename your own libraries
	 * Or Packages to make it easer to use without using the namespaces
	 * Write you {$key} and {$value}
	 * the $key is the new name of your package or your class
	 * and the $value is the full path of your package
	 */
	


	/*
	 * Framework built in Libraries
	 */
	
	'Router' 	=> IqFramework\App\Http\Router::class,
	'Database' 	=> IqFramework\App\Models\Database::class,
	'Request' 	=> IqFramework\App\Http\Request::class,
	'Validator' => Rakit\Validation\Validator::class,
	'Session'   => IqFramework\App\Http\Session::class,
	'Cookie'    => IqFramework\App\Http\Cookie::class,
	'Carbon'    => Carbon\Carbon::class,


	/*
	 * Add your libraries here
	 * ....
	 */








	/*
	 * Add your Commands here
	 * ....
	 */
	'CreateNewControllerCommand' => App\Commands\CreateNewControllerCommand::class,
	'CreateRouteCommand' => App\Commands\CreateRouteCommand::class,


















];


