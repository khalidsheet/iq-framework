<?php 	

	//use Models\Database;
 
	require 'class_aliases.php';
	require 'vendor/autoload.php';
	require 'helpers.php';
	require 'app/database.php';

	autoload_classess('http');
	setClassAlias($class_aliases);
	autoload_classess('controllers');
	autoload_classess('models');