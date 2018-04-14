<?php 	
 
	require 'class_aliases.php';
	require 'vendor/autoload.php';
	require 'helpers.php';
	require 'app/database.php';
	require 'commandsControl.php';

	autoload_classess('http');
	autoload_classess('commands');
	setClassAlias($class_aliases);
	autoload_classess('exceptions');
	autoload_classess('controllers');
	autoload_classess('models');