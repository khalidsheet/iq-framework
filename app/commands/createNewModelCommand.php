<?php 

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;



class CreateNewModelCommand extends Command
{
    protected function configure()
    {
	    $this->setName('make:model')
	    	 ->addArgument('name', InputArgument::REQUIRED, 'The name of the model.')
	       	 ->setDescription('Creates a new model.')
	         ->setHelp('This command allows you to create a model...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$name = ucfirst($input->getArgument('name'));
    	$dir  = "app/models/{$name}.php";
		$io   = new SymfonyStyle($input, $output);

		$io->title("Creating {$name} Model....");

		$model = fopen($dir, "w") or die("Unable to open file!");
		fwrite($model, $this->ControllerFileContent($name));
		fclose($model);

	    $io->success("Model {$name} created successfully.");
    }


    private function ControllerFileContent($className)
    {
    	return "<?php 
    	\nnamespace App\Models;\n
        \nuse \Illuminate\Database\Eloquent\Model;
    	\nclass {$className} extends Model {\n
    	\n}
    	";
    }
}