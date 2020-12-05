<?php
// Load Config
require_once 'config/config.php';

// Autoload Core libraries
spl_autoload_register(function($className) {
  $fileName = "libraries/{$className}.php";
  require_once $fileName;
});
