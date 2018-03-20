<?php 

namespace IqFramework\App\Http;


class Cookie
{
	public $_prefix;
	
	function __construct($prefix = 'iq_framework_')
	{
		$this->_prefix = $prefix;
	}

	public function isEnabled()
	{
		return count($_COOKIE) > 0 ? true : false;
	}

	public function set($key, $value, $time = 1, $path = '/')
	{
		$time = time() + (24 * 60 * 60 * $time);
		setcookie($this->_prefix.$key, $value, $time, $path);
		return $this;
	}

	public function remove($key)
	{
		setcookie($key, "", time() - 3600);

		return $this;
	}

	public function get($key)
	{
		return $_COOKIE[$key];
	}

	public function all()
	{
		return $_COOKIE;
	}
}
