<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */
use Silex\Provider\MonologServiceProvider;

date_default_timezone_set('UTC');

if (!defined('ROOT_PATH')) {
    define("ROOT_PATH", __DIR__ . "/..");
}

define('APP_NAME', 'DefaultServiceAppName');

//Doctrine
$app->register(
    new \Silex\Provider\DoctrineServiceProvider(),
    array(
        'db.options' => array(
            'driver' => getenv('API_DB_DRIVER'),
            'dbname' => getenv('API_DB_NAME'),
            'user' => getenv('API_DB_USER'),
            'password' => getenv('API_DB_PWD'),
            'memory' => getenv('API_DB_MEMORY'),
            'charset' => 'utf8',
        )
    )
);

//Redis
//$app->register(
//    new Predis\Silex\ClientServiceProvider(),
//    [
//        'predis.parameters' => getenv('REDIS_HOST'),
//    ]
//);

//Monolog
$app->register(
    new MonologServiceProvider(),
    [
        'monolog.handler' => function () use ($app) {
                $level = MonologServiceProvider::translateLevel($app['monolog.level']);

                $handler = new \Monolog\Handler\SyslogUdpHandler(
                    getenv('RSYSLOGD_HOST'),
                    getenv('RSYSLOGD_PORT'),
                    LOG_USER,
                    $level,
                    $app['monolog.bubble']
                );
                $formatter = new \Monolog\Formatter\LogstashFormatter(APP_NAME);
                $handler->setFormatter($formatter);
                return $handler;
            },
    ]
);

// Monitoring - use $app['monitor'] (\League\StatsD\Client) to monitor custom metrics
$app->register(
    new \League\StatsD\Silex\Provider\StatsdServiceProvider(),
    array(
        'statsd.host' => getenv('API_MONITOR_HOST'),
        'statsd.port' => getenv('API_MONITOR_PORT'),
        'statsd.namespace' => getenv('API_MONITOR_NAMESPACE'),
    )
);

$app['monitor'] = function () use ($app) {
    return $app['statsd'];
};

