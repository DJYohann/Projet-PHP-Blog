<?php

// config
require_once(__DIR__.'/utils/config.php');

session_start();

// autoloader
require_once(__DIR__.'/utils/Autoload.php');
Autoload::charger();

new FrontController();

?>
