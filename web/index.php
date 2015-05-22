<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__ . '/../app/app.php';

$app->run();
