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