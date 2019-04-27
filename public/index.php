<?php
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

require_once '../vendor/autoload.php';
try {
     
     $dotenv = Dotenv\Dotenv::create("../");
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$settings=require_once '../src/settings.php';

$app = new \Slim\App($settings);

 require_once '../src/DI.php';
 require_once '../src/middleware.php';
  require_once '../api/Auth.php';
 require_once '../routes/web.php';
 

 
$app->run();