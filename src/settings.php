<?php
return [
 'settings' => [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true',

        'app' => [
            'name' => getenv('slim_mysqli')
        ],
        // Monolog settings
       'logger' => [
           'name' => 'Your Log API ',
           'path' => '/../logs/app.log',
           'level' => \Monolog\Logger::DEBUG,
       ],
       // database settings
        'database'=>[
            'driver'=> getenv('DB_DRIVER'),
            'host'=>getenv('DB_HOST'),
            'port'=>getenv('DB_PORT'),
            'database'=>getenv('DB_DATABASE'),
            'username'=>getenv('DB_USERNAME'),
            'password'=>getenv('DB_PASSWORD'),
            'charset'=>getenv('DB_CHARSET'),
            'collation'=>getenv('DB_COLLATION'),
        ]
    ],
];
