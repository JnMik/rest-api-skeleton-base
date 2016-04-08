<?php

/*
putenv("API_DB_DRIVER=pdo_mysql");
putenv("API_DB_NAME=api.adult-categories-service");
putenv("API_DB_USER=root");
putenv("API_DB_PWD=");
putenv("ENV=DEV");
*/


if (!defined('APP_NAME')) {
    define('APP_NAME', 'API Exemple');
}

if (extension_loaded('newrelic')) {
    newrelic_set_appname(APP_NAME);
}

define("SERVICE_DEPENDENCY_URL", serialize(array(
    //'table_name' => 'http://url-to-access-the-ressource/1.0/endpoint',
)));

define("HATEOAS", serialize(array(
    //'table_name' => $app['serviceDependencyUrl']['categories'] . '/%d'
)));


const API_DB_DRIVER = 'pdo_mysql';
const API_DB_HOST = '10.1.15.121';
const API_DB_NAME = 'exemple_dbname';
const API_DB_USER = 'root';
const API_DB_PWD = '';
const API_DB_MEMORY = false;
const ENV = 'DEV';
