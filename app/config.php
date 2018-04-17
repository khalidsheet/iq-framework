<?php 
	
	return [


		/*
		 * key "config" if the general configuration for your current project,
		 * feel free to add your own keys after "route_prefix" and use then as you want!
		 */	
		'config' => [
			/*
			 * The name of your Project,
			 */			
			'name' => 'IQ Framework',
			/*
			 * The version of your Project,
			 */	
			'version' => '1.0.0',
			/*
			 * Rotue Prefix will be "myFramework" by default,
			 * If you're using "localhost", then change it to your folder
			 * If you aren't, then change it to "/" or leave it empty
			 * Also you can change it to whatever you want to make it a default
			 * route prefix for all your routes.
			 */
			'routes_prefix' => 'myFramework' // default "myFramework"
		],


		/*
		 * Settings of your database connection!
		 */	
		'database' => [
			'connection' => 'mysql',
			'db_host' => '127.0.0.1',
			'db_name' => 'simpleframework',
			'db_user' => 'root',
			'db_pass' => 'root'
		],


		/*
		 * Settings of your Mail connection!
		 */	
		'mail' => [
			'host' => '',
			'sender_name' => '',
			'sender_email' => '',
			'sender_password' => '',
			'port' => 587,

			// mailer settings
			'mailSMTPDebug' => 2,
			'isSmtp' => true,
			'smtpAuth' => true,
			'smtpSecure' => 'tls',
		]
	];