<?php 

namespace IqFramework\App\Http;
	
use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter {

    public static function start() {

        require_once 'routes/web.php';
        parent::start();

    }


    public function auth($authPath = 'auth/')
    {
    	self::post(uri() . 'login', 'AuthController@login');
    }

}