<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jm
 * Date: 16-01-20
 * Time: 20:42
 * To change this template use File | Settings | File Templates.
 */

namespace Crak\Api\DefaultNS\Provider;

use Crak\Api\DefaultNS\Controller\ExempleController;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ControllerProvider implements ServiceProviderInterface {

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {

        $app['exemple.controller'] = $app->share(
            function () use ($app) {
                return new ExempleController(
                    $app['rest_normalizer.builder'],
                    $app['logger'],
                    $app['exemple.repository'],
                    $app['request'],
                    $app['hateoas'],
                    $app['paginator.service'],
                    $app['json-api-transport.service'],
                    'Crak\Api\DefaultNS\Model\ExempleModel'
                );
            }
        );

    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

}