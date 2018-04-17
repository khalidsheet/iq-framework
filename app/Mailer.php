<?php 

namespace IqFramework\App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
	protected $senderName;
	protected $senderEmail;
    protected $mailSMTPDebug;                       
    protected $isSMTP;             
    protected $host;  
    protected $smtpAuth;                                   
    protected $password;                         
    protected $smtpSecure;                 
    protected $port;

    protected static $instance;

	
	public function __construct()
	{
		self::$instance = new PHPMailer(true);

		// run mailer base settings
		$this->setupMailerSettings();

		// run mailer settings  
		$this->setupMailer();

		// sender email
		self::$instance->setFrom($this->senderEmail, $this->senderName);
	}

	protected static function instance() {
		return self::$instance;
	}

	private function setupMailer() {
		$instance = self::$instance;

	    $instance->SMTPDebug  = $this->mailSMTPDebug;                                
	    $instance->isSMTP($this->isSMTP);                                      
	    $instance->Host       = $this->host;  
	    $instance->SMTPAuth   = $this->smtpAuth;                               
	    $instance->Username   = $this->senderEmail;                
	    $instance->Password   = $this->password;                           
	    $instance->SMTPSecure = $this->smtpSecure;                            
	    $instance->Port 	  = $this->port; 
	}

	private function setupMailerSettings() {
		$this->senderName 		= config('sender_name', 'mail');
		$this->senderEmail 		= config('sender_email', 'mail');
		$this->password 		= config('sender_password', 'mail');
		$this->mailSMTPDebug 	= config('mailSMTPDebug', 'mail');
		$this->isSMTP 			= config('isSmtp', 'mail');
		$this->host 			= config('host', 'mail');
		$this->smtpSecure 		= config('smtpSecure', 'mail');
		$this->smtpAuth 		= config('smtpAuth', 'mail');
		$this->isSMTP 			= config('isSmtp', 'mail');
		$this->port 			= config('port', 'mail');
	}


	public static function send(Mailer $mail)
	{
		$instance = self::$instance;
		self::address($mail->to);
		self::subject($mail->subject);

		if (method_exists($mail, 'setup')) {
			$mail->setup();
		}

		if (method_exists($mail, 'handle')) {
			$instance->Body = $mail->handle();
		}
        
		$instance->send();

	}


	public static function address(array $emails)
	{
		$instance = self::$instance;

		if(is_array($emails)) {
			foreach ($emails as $email) {
				$instance->addAddress($email);
			}
		}

		return $instance;
	}

	public static function subject(string $subject)
	{
		self::$instance->Subject = $subject;
	}

	public function replyTo(array $emails)
	{
		if (is_array($emails)) {
			foreach($emails as $email) {
				self::$instance->addReplyTo($email);
			}
		}

		return self::$instance;
	}


	public function cc(array $emails)
	{

		if (is_array($emails)) {
			foreach($emails as $email) {
				self::$instance->addCC($email);
			}
		}

		return self::$instance;
	}

	public function bcc(array $emails)
	{
		if (is_array($emails)) {
			foreach($emails as $email) {
				self::$instance->addBCC($email);
			}
		}

		return self::$instance;

	}

	public function attachment(array $attachments)
	{

		if (is_array($attachments)) {
			foreach($attachments as $attach) {
				self::$instance->addAttachment($attach);
			}
		}

		return self::$instance;
	}

	private function body($content, $isHtml = true)
	{
	    self::$instance->isHTML($isHtml);
	    self::$instance->Body = $content;

	    return self::$instance;
	}

}