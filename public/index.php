<?php
require_once("../vendor/autoload.php");

session_start();

// Vistas

use Philo\Blade\Blade;

$views = '../src/views';
$cache = '../cache';

$blade = new Blade($views, $cache);

// Router System
$router = new AltoRouter();



// List of routes

$router->map('GET', '/', 'home');

//Routes for Login
$router->map('GET', '/login', 'login.login');
$router->map('POST', '/login', 'loginController#login');
$router->map('GET', '/logout', 'loginController#logout');

if (isset($_SESSION['id'])) {
    //Routes for Users

    $router->map('GET', '/user', 'userController#index');
    $router->map('POST', '/user', 'userController#store');
    $router->map('GET', '/user/[i:id]', 'userController#show');
    $router->map('GET', '/user/create', 'user.create');
    $router->map('GET', '/user/[i:id]/edit', 'userController#edit');
    $router->map('PUT', '/user/[i:id]', 'userController#update');
    $router->map('DELETE', '/user/[i:id]/destroy', 'userController#destroy');

    //Routes for Parties
    $router->map('GET', '/party', 'partyController#index');
    $router->map('GET', '/party/create', 'partyController#create');
    $router->map('POST', '/party', 'partyController#store');
    $router->map('GET', '/party/[i:id]/edit', 'partyController#edit');
    $router->map('PUT', '/party/[i:id]', 'partyController#update');
    $router->map('DELETE', '/party/[i:id]/destroy', 'partyController#destroy');

    // Change Method PUT and DELETE
    if (isset($_POST['_METHOD'])) {
        $_SERVER['REQUEST_METHOD'] = $_POST['_METHOD'];
    }
}
// End of List

$match = $router->match();
if ($match) {
    $target = $match["target"];
    if (is_string($target) && strpos($target, "#") !== false) {
        list($controller, $action) = explode("#", $target);
        $controller = "Dsw\AmigoInvisible\controllers\\" . $controller;
        $controller = new $controller;
        $controller->$action($match["params"]);
    } else {
        if (is_callable($match["target"])) call_user_func_array($match["target"], $match["params"]);
        else echo $blade->view()->make($match["target"])->render();
    }
} else {
    echo "Ruta no válida";
    die();
}
