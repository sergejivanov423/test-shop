<?php

// Database configs
define('HOST', 'localhost');
define('DB_NAME', 'phpshop');
define('USER', 'vodolserge');
define('PASSWORD', 'admin');

// Path to Controllers folder
define('CONTROLLER', dirname(__DIR__).'/app/core/controllers/');

// Path to Views folder
define('VIEWS', dirname(__DIR__).'/app/core/views/');

// Relative path (without name of host)
define('SITE_URL','/');

// Path to [template] folder
define('TPL', SITE_URL.'app/template/web/');
