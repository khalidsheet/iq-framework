<?php 

 	function autoload_classess($path = null, $folder = 'app', $ext = 'php')
 	{
 		$files = [];
 		if ($path !== null && $path !== '' && !empty($path)) {
 			$files = glob($folder . '/' . $path . '/*.' . $ext);
 		} else {
 			$files = glob("{$folder}/*.{$ext}");
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


 	function toJson($data)
 	{
 		header('Content-type:application/json');
 		return json_encode($data);
 	}


 	function setClassAlias(array $aliases)
 	{
 		foreach ($aliases as $class => $alias) {
 			class_alias($alias, $class);
 		}
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