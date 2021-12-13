<?php

// config
require_once(__DIR__.'/utils/config.php');

// autoloader
require_once(__DIR__.'/utils/Autoload.php');
Autoload::charger();

new FrontController();

?>
