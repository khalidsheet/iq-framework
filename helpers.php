<?php 

 	function autoload_classess($path, $folder = 'app', $ext = 'php')
 	{
 		$files = [];
 		if ($path !== '' && !empty($path)) {
 			$files = glob($folder . '/' . $path . '/*.' . $ext);
 		} else {
 			$files = glob('app/controllers/*.php');
 		}

 		foreach($files as $file) {
 			include $file;
 		}
 	}

 	function config($key, $parent = 'config')
 	{
 		$app = include('app/config.php');

 		return $app[$parent][$key];

 	}

 	function oauth(string $key)
 	{
 		$oauth = include 'app/oauth.config.php';

 		return $oauth[$key];
 	}


 	function toJson($data)
 	{
 		header('Content-type:application/json');
 		$json = json_encode($data);

 		return $json;
 	}


 	function setClassAlias(array $aliases)
 	{
 		foreach ($aliases as $class => $alias) {
 			class_alias($alias, $class);
 		}
 	}

 	function uri($uri = 'myFramework')
 	{
 		return $_SERVER['REQUEST_URI'] === $uri ? $uri : $_SERVER['REQUEST_URI'];
 	}


 	function view($viewName, array $data)
 	{
 		global $template;
 		$path = $viewName . '.iqv.php';

 		return $template->render($path, $data);
 	}


 	function registerCommands(Symfony\Component\Console\Application $application)
 	{

 		$path = 'App/Commands/*';
 		$commands = glob($path);
 	
 		foreach ($commands as $command) {
 			$command = end(explode('\\', str_replace('/', '\\', explode('.', $command)[0])));
 			$application->add(new $command);
 		}
 		
 		return $application;
 	}




 	