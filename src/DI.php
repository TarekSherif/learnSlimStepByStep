<?php
use \Firebase\JWT\JWT;

$container=$app->getContainer();

$capsule=new Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container['settings']['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();



// DB
$container["DB"]= function ($container)use($capsule)
{
     return $capsule;
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


// Controllers
$container["HomeController"]= function ($container)
{
  $HomeController=new \App\Controllers\HomeController($container);
  return  $HomeController;
};
// Auth
$container["JWT"]= function ($container)
{
   $JWT=new JWT();
   return $JWT;
};