<?php
require_once __DIR__ . '/vendor/autoload.php';

$base  = dirname($_SERVER['PHP_SELF']);

// Update request when we have a subdirectory
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
