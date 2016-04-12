<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

use Crak\Api\DefaultNS\Provider\ControllerProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Support3w\Api\Generic\Provider\DefaultControllerProvider;
use Support3w\Api\Generic\Provider\RepositoryProvider;
use Support3w\Api\Generic\Provider\RestNormalizerProvider;
use Crak\Api\DefaultNS\Provider\ControllerProvider as AppControllerProvider;

$app['debug'] = true;
$app['api.version'] = '1.0';
$app['api.endpoint'] = '/';

require __DIR__ . '/config.php';
require __DIR__ . '/middleware.php';
require __DIR__ . '/routing.php';

// Rest Normalizer
$app->register(new RestNormalizerProvider());

// Validator
$app->register(new ValidatorServiceProvider());

// Controllers
$appControllerProvider = new AppControllerProvider();
$app->register(new ServiceControllerServiceProvider());
$app->register(new DefaultControllerProvider());
$app->register(new ControllerProvider());

// Repositories
$app->register(new RepositoryProvider(
    $appControllerProvider->registerControllers()
));

// Errors
/*$app->error(
    function (\Exception $e, $code) use ($app) {
        $app['logger']->addError($e->getMessage());

        return new JsonResponse(['error' => $e->getMessage()], $code);
    }
);*/

return $app;
