<?php

namespace App\Controllers;
 
use App\Controllers\Controller;
use App\Models\User;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $userList= $this->mysqli->getList("select * from user",\fetchType::fetch_array);
   //  return $res->withJson($userList,200);   Error in slim3 UTF8 
      return $response
               ->withHeader("Content-Type", "application/json")
               ->write(json_encode($userList, JSON_UNESCAPED_UNICODE),200);

    }
     public function hello(Request $request, Response $response, $args)
    {
      // $users=$this->DB->table("user")->find(1);
      $users=User::find(1);
      var_dump($users);
       die();

      return $this->view->render($response,"hello.twig");

    }
}
