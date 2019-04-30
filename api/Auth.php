<?php

 

$app->get("/api/token", function ($request, $response, $arguments) {
    
    $JWT=$this->JWT;

    $now = new DateTime();
    $future = new DateTime("now +30 minutes");
    // $server = $request->getServerParams();
    $payload = [
        "iat" => $now->getTimeStamp(),
        "exp" => $future->getTimeStamp(),
        "sub" => $server["PHP_AUTH_USER"],
    ];
    $secret = getenv("JWT_SECRET");
    $token = $JWT->encode($payload, $secret, "HS512");
    $data["status"] = "ok";
    $data["token"] = $token;
    return $response->withStatus(201)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});
