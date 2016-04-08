<?php


/*
putenv("API_DB_DRIVER=pdo_mysql");
putenv("API_DB_NAME=api.adult-categories-service");
putenv("API_DB_USER=root");
putenv("API_DB_PWD=");
putenv("ENV=DEV");
*/


if (extension_loaded('newrelic')) {
    newrelic_set_appname('API - Exemple');
}

define("HATEOAS", serialize(array(
    //'media_categories' => $app['serviceDependencyUrl']['categories'] . '/%d',
    // 'ads_position' => $app['serviceDependencyUrl']['ads_position'] . '/%d',
    // 'ads_type' => $app['serviceDependencyUrl']['ads_type'] . '/%d'
)));


define("SERVICE_DEPENDENCY_URL", serialize(array(
    //'channel_banner' => 'http://api.adult-channel-service/1.0/channel_banner',
    //'ads_position' => 'http://api.adult-channel-service/1.0/ads_position',
    //'ads_type' => 'http://api.adult-channel-service/1.0/ads_type'
)));


// define constant or use environment variables (might be useful with docker)
const API_DB_DRIVER = 'pdo_mysql';
const API_DB_HOST = 'localhost';
const API_DB_NAME = 'exemple-dbname';
const API_DB_USER = 'root';
const API_DB_PWD = '';
const API_DB_MEMORY = '';
const ENV = 'DEV';
