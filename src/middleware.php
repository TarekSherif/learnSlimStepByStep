<?php


use Tuupola\Middleware\HttpBasicAuthentication;
use Tuupola\Middleware\JwtAuthentication;
use Tuupola\Middleware\HttpBasicAuthentication\AuthenticatorInterface;

class AuthenticatorClass implements AuthenticatorInterface
{
  private $pdo;
  public function __construct($container)
    {
        $this->pdo=$container->get('pdo');
    }
    public function __invoke(array $arguments): bool
    {
        $Email = $arguments['user'];
        $Password = $arguments['password'];
        $sql="select count(*) as count  from user where email='$Email' and password='$Password'";
        $check=$this->pdo->getList($sql,fetchType::fetch_assoc) [0]['count'];
     
         return ($check=='1') ? true : false;
    }

}

$app->add(new HttpBasicAuthentication([
    "path" => "/api/token",
    "authenticator" => new AuthenticatorClass($app->getContainer()),
]));

$app->add(new JwtAuthentication([
    "path" => ["/"],
   "ignore" => ["/api/token" ],
    "secret" => "supersecretkeyyoushouldnotcommittogithub",
    "error" => function   ($response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    },
]));
