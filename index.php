<?php
// Point of entry

use ShopApp\Components\Router;
use ShopApp\Exceptions\ContrExeption;

// Common config
ini_set('display_errors',1);
error_reporting(E_ALL);

// Autoload classes and files
require_once(__DIR__.'/vendor/autoload.php');
$routes = require_once(__DIR__.'/config/routes.php');


try{
    // Call Router
    $router = new Router($routes);
    $router->run();

} catch (ContrExeption $e) {
    echo $e->getMessage();
    return;
}

