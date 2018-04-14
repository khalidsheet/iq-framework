<?php 

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputOption;


class CreateRouteCommand extends Command
{
    protected function configure()
    {
	    $this->setName('make:route')
	    	 ->addArgument('url', InputArgument::REQUIRED, 'The url of the route.')
             ->addOption('method', 'm', InputOption::VALUE_OPTIONAL, 'Select Your Method','get')
             ->addOption('controller', 'c', InputOption::VALUE_REQUIRED, 'Select Your Controller', 'HomeController')
             ->addOption('function', 'f', InputOption::VALUE_REQUIRED, 'Select Your Method', 'home')
	       	 ->setDescription('Creates a new Rotue.')
	         ->setHelp('This command allows you to create a route...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // define output/input to customize the console font 
        $io = new SymfonyStyle($input, $output);

        // get args & opts
        $url = $input->getArgument('url');
        $controller = ucfirst($input->getOption('controller'));
        $method = $input->getOption('method');
        $function = $input->getOption('function');

        // set dir to write or append the content
    	$dir  = "routes/web.php";

        // display new message in the CLI
		$io->title("Creating your Route....");
        
        // Open the file to make changes
		$route = fopen($dir, "a") or die("Unable to open file!");
		fwrite($route, $this->newRouteRegisteration($method, $url, $controller, $function));
		fclose($route);

        // display the final message with green bg!
	    $io->success("Route created successfully.");
    }


    // define the route structure
    private function newRouteRegisteration($method, $url, $controller, $function)
    {
    	return "\nRouter::$method(\"{$url}\", \"{$controller}@{$function}\");";
    }
}