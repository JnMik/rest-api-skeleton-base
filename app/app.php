<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

use Crak\Api\DefaultNS\Provider\DefaultControllerProvider;
use Crak\Api\DefaultNS\Provider\DefaultValidatorProvider;
use Crak\Api\DefaultNS\Provider\RestNormalizerProvider;
use Crak\Api\DefaultNS\Repository\DefaultRepository;
use Silex\Application;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;

$app['debug'] = true;
$app['api.version'] = '1.0';
$app['api.endpoint'] = '/';

require __DIR__ . '/config.php';
require __DIR__ . '/middleware.php';
require __DIR__ . '/routing.php';

//Monolog
$app->register(
    new MonologServiceProvider(),
    array(
        'monolog.logfile' => ROOT_PATH . '/logs/app.log',
        'monolog.class_path' => ROOT_PATH . '/vendor/monolog/src'
    )
);

//Rest Normalizer
$app->register(new RestNormalizerProvider());

//Repository
$app['default.repository'] = $app->share(
    function () use ($app) {
        return new DefaultRepository($app['db']);
    }
);

//Validator
$app->register(new ValidatorServiceProvider());
$app->register(new DefaultValidatorProvider());

//Controllers
$app->register(new ServiceControllerServiceProvider());
$app->register(new DefaultControllerProvider());

//Errors
$app->error(
    function (\Exception $e, $code) use ($app) {
        $app['monolog']->addError($e->getMessage());

        return new JsonResponse(['error' => $e->getMessage()], $code);
    }
);

return $app;
