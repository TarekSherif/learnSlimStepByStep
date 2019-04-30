<?php
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;

require_once '../bootstrap/app.php';
require_once '../src/DI.php';
require_once '../src/middleware.php';
require_once '../api/Auth.php';
require_once '../routes/web.php';
 

 
$app->run();