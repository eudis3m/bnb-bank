<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$allowedOrigins =  array (
    /*'http://127.0.0.1:5000/*',
    'http://localhost:5000/*',
    'http://127.0.0.1:8000/CustomerIndex',
    'http://localhost:5000/transactions/*',*/
    '*'
  );
  if(isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != ''){
     foreach($allowedOrigins as $allowedOrigin){
       if(preg_match('/^[a-zA-Z0-9 \r\n\/\[\].-]*$allowedOrigin/', $_SERVER['HTTP_ORIGIN'])){
        header('Access-Control-Allow-Origin:'  .$_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: PUT, POST, DELETE, GET, OPTIONS');
        header('Access-Control-Allow-Max-Age: 1728000');
        header('Access-Control-Allow_Credentials: true');
        //header('Access-Control-Allow-Headers:Content-Type, Origin,  X-Requested-With, Accept, x-client-key, x-client-token, x-client-secret, Authorization');
        header('Access-Control-Allow-Headers: Origin,Content-Type,X-Auth-Token, Authorization, X-Requested-With, Content-Range,
        Content-Disposition, Content-Description, x-xsrf-token, ip, Accept, x-client-key, x-client-token, x-client-secret');
        break;
     }
   }
  } 

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
