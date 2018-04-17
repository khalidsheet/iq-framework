<?php 

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;



class CreateNewMailCommand extends Command
{
    protected function configure()
    {
	    $this->setName('make:mail')
	    	 ->addArgument('name', InputArgument::REQUIRED, 'The name of the Mail.')
	       	 ->setDescription('Creates a new Mail.')
	         ->setHelp('This command allows you to create a Mail...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$name = ucfirst($input->getArgument('name'));
    	$dir  = "app/mails/{$name}.php";
		$io   = new SymfonyStyle($input, $output);

		$io->title("Creating {$name} Mail....");

		$mail = fopen($dir, "w") or die("Unable to open file!");
		fwrite($mail, $this->mailContent($name));
		fclose($mail);

	    $io->success("Mail {$name} created successfully.");
    }


    private function mailContent($className)
    {
        return "<?php\n\nnamespace IqFramework\App\Mail;\n\nuse Mailer;\n\nclass {$className} extends Mailer\n{\n\tprotected \$to = [\"test@something.com\"];\n\tprotected \$subject = \"New Test Mail\";\n\n\n\tpublic function setup()\n\t{\n\n\t}\n\n\t// Write your email content\n\tpublic function handle()\n\t{\n\n\t}\n\n}";
    }
}