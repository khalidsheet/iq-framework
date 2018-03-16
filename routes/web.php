<?php 


Router::auth();

Router::match(['get', 'post'], 'myFramework/{id}', 'HomeController@home');
Router::match(['get', 'post'], 'myFramework/d', 'HomeController@home');