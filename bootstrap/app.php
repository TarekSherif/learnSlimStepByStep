<?php
session_start();
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
