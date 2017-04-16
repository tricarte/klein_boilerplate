<?php
require_once __DIR__ . '/vendor/autoload.php';

// Update request when we have a subdirectory
// $base  = dirname($_SERVER['PHP_SELF']);
// if(ltrim($base, '/')) {
//     $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
// }

// Dispatch as always
$klein = new \Klein\Klein();

$klein->respond('GET', '/', function ($req, $res) {
    $x = (object) [
        'a' => 'b',
    ];
    $res->json($x);
});

$klein->onHttpError(function ($code, $router, $matched) {
    $router->response()->body('Error: ' . $code);
});

$klein->dispatch();
