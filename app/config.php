<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

if (!defined('ROOT_PATH')) {
    define("ROOT_PATH", __DIR__ . "/..");
}

//Doctrine
$app->register(
    new \Silex\Provider\DoctrineServiceProvider(),
    array(
        'db.options' => array(
            'driver' => getenv('API_DB_DRIVER') ? : 'pdo_mysql',
            'dbname' => getenv('API_DB_NAME') ? : 'db_crakpass',
            'user' => getenv('API_DB_USER') ? : 'root',
            'password' => getenv('API_DB_PWD') ? : '',
            'memory' => getenv('API_DB_MEMORY') ? : false,
            'charset' => 'utf8',
        )
    )
);
