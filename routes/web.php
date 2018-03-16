<?php 


Router::auth();

Router::match(['get', 'post'], 'myFramework', 'HomeController@home');
Router::match(['get', 'post'], 'myFramework/d', 'HomeController@home');