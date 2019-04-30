<?php
use \Firebase\JWT\JWT;

$container=$app->getContainer();

$container["JWT"]= function ($container)
{
   $JWT=new JWT();
   return $JWT;
};

$container["mysqli"]= function ($container)
{
  $dbConfig=$container['settings']['database'];
  $dbMsqliObj = new dbMysqli($dbConfig);

   return $dbMsqliObj;
};
$container["pdo"]= function ($container)
{
  $dbConfig=$container['settings']['database'];
  $dbPdoObj = new dbPdo($dbConfig);
    return $dbPdoObj;
  
};
$container["view"]= function ($container)
{
  $view=new \Slim\Views\Twig(__DIR__."/../resources/views",[
    'cache'=>false
  ]);

 $view->addExtension(new \Slim\Views\TwigExtension(
$container->router,
$container->request->getUri()
 ));
    return  $view;
  
};

$container["HomeController"]= function ($container)
{
  $HomeController=new \App\Controllers\HomeController($container);
 
  return  $HomeController;
  
};