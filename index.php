<?php

require_once 'app/config/routes.php';

spl_autoload_register();
$routing = new vendor\Routing;
$routing->startApp();
