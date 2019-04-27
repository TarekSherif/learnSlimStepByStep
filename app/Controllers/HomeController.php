<?php

namespace App\Controllers;
use DB;
use App\Controllers\Controller;
use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $userList= $this->c->mysqli->getList("select * from user",\fetchType::fetch_array);
   //  return $res->withJson($userList,200);   Error in slim3 UTF8 
      return $response
               ->withHeader("Content-Type", "application/json")
               ->write(json_encode($userList, JSON_UNESCAPED_UNICODE),200);

    }
}
