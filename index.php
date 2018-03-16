<?php 

	include_once 'init.php';

	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();

	new Database();
	Router::start();