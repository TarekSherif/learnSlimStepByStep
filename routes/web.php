<?php

use App\Controllers\HomeController;

$app->get('/', HomeController::class . ':index');

$app->get('/hello', 'HomeController:hello');

$app->get('/home',  function ($req,$res)
{
return $this->view->render($res,"home.twig");
});
