<?php 
	
	return [
		'config' => [
			'name' => 'IQ Framework',
			'version' => '1.0.0',
			'routes_prefix' => uri() // default "myFramework"
		],
		'database' => [
			'connection' => 'mysql',
			'db_host' => '127.0.0.1',
			'db_name' => 'simpleframework',
			'db_user' => 'root',
			'db_pass' => 'root'
		]
	];