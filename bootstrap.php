<?php

require_once __DIR__.'/vendor/autoload.php';

if(!is_file(__DIR__.'/envConfig.php')) {
    die('Missing environment config file');
}

require_once __DIR__.'/envConfig.php';

$app = new Silex\Application();

require __DIR__ . '/app/app.php';