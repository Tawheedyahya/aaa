<?php
define('BASE_PATH', __DIR__);
require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

use FastRoute\RouteCollector;

// ----------------------
// Database Setup
// ----------------------
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'aaa_db',
    'username'  => 'root',
    'password'  => 'yahi',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// ----------------------
// Blade Setup
// ----------------------

use duncan3dc\Laravel\BladeInstance;

$blade = new BladeInstance(
    __DIR__ . '/views',
    __DIR__ . '/cache'
);

// ----------------------
// Routing Setup
// ----------------------
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    require __DIR__ . '/routes/web.php';
});

// ----------------------
// Dispatch Request
// ----------------------
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo "404 Not Found";
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo "405 Method Not Allowed";
        break;

    case FastRoute\Dispatcher::FOUND:
        [$class, $method] = $routeInfo[1];
        $vars = $routeInfo[2];

        $controller = new $class($blade);
        call_user_func_array([$controller, $method], $vars);
        break;
}