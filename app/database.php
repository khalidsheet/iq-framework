<?php
 
namespace IqFramework\App\Models; 
use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database {
 
   public function __construct() {
        $capsule = new Capsule;
        $capsule->addConnection([
         'driver' => config('connection', 'database'),
         'host' => config('db_host', 'database'),
         'database' => config('db_name', 'database'),
         'username' => config('db_user', 'database'),
         'password' => config('db_pass', 'database'),
         'charset' => 'utf8',
         'collation' => 'utf8_unicode_ci',
         'prefix' => '',
        ]);
        // Setup the Eloquent ORM… 
        $capsule->bootEloquent();
    }
 
}