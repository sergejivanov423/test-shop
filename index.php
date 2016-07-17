<?php
// Point of entry

use ShopApp\Components\Router;

// Common config
ini_set('display_errors',1);
error_reporting(E_ALL);

// Autoload classes and files
require_once(__DIR__.'/vendor/autoload.php');
$routes = require_once(__DIR__.'/config/routes.php');


