<?php
require_once __DIR__ . '/vendor/autoload.php';
use Noodlehaus\Config;

// Update request when we have a subdirectory
// $base  = dirname($_SERVER['PHP_SELF']);
// if(ltrim($base, '/')) {
//     $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
// }

$klein = new \Klein\Klein();

// Run before all routes are executed.
// This is where you register services and specify default layout
$klein->respond(function ($req, $res, $service, $app) {
    // $app->register('dbconn', function () {
    //     $dbconn = new PDO("sqlite:./db/database.sqlite");
    //     return $dbconn;
    // });
    $app->register('config', function () {
        $config = Config::load('config.php');
        return $config;
    });
    $service->layout('views/layouts/default.php');
});

// Home page view
$klein->respond('/', function ($request, $response, $service, $app) {
    // add some data to the view.
    $service->pageTitle = $app->config->get('site_title');
    // This is the function that renders the view inside the layout.
    $service->render('views/home.php');
});

// About page view
$klein->respond('/about', function ($request, $response, $service) {
    $service->pageTitle = 'About';
    $service->render('views/about.php');
});

// About page view using separate class method
$klein->respond('/aboutclass', \Routes\AboutAction::index());

// Return JSON response
$klein->respond('GET', '/api', function ($req, $res) {
    $x = (object) [
        'a' => 'b',
    ];
    $res->json($x);
});

// Catch all HTTP errors
$klein->onHttpError(function ($code, $router, $matched) {
    $router->response()->body('Error: ' . $code);
});

// Dispatch as always
$klein->dispatch();
