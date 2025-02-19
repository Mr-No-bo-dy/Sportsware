<?php

require_once 'app/routes/web.php';

spl_autoload_register();
$routing = new vendor\Routing;
$routing->startApp();
