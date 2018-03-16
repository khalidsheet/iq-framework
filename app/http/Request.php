<?php 

namespace IqFramework\App\Http;

class Request
{
	protected $allRequest;
	protected $onlyRequest;
	protected $method;
	
	public function __construct()
	{
	   $this->allRequest = $_REQUEST;
	   $this->method = $_SERVER['REQUEST_METHOD'];

	   foreach ($this->allRequest as $key => $value) {
	   		$this->$key = $value;
	   }
	}

	private static function call_attr($key) {
		return (new self)->$key;
	}


	public static function all()
	{
		return self::call_attr('allRequest');
	}


	public static function method()
	{
		return self::call_attr('method');
	}

	public static function get($key)
	{
		return (new self)->allRequest[$key];
	}
}