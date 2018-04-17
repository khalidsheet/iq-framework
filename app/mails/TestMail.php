<?php 

namespace IqFramework\App\Mail;

use Mailer;

class TestMail extends Mailer
{
	protected $to = ["test@mail.com"];

	protected $subject = "New Test Mail";




	public function setup()
	{
		$this->cc(['someEmail@mail.com']);
	}

	public function handle()
	{
		return 'The Content of the E-mail';
	}
}