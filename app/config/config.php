<?php
// Load all external libraries
require '../vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
$dotenv->load();

// DB Params
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('URLROOT', $_ENV['URLROOT']);

// Site Name
define('SITENAME', 'PHP MVC Framework');
