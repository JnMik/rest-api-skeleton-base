<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Provider;

use Crak\Api\DefaultNS\Controller\DefaultController;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Class DefaultControllerProvider
 *
 * @package  Crak\Api\Domain\Provider
 * @author   Sylvain Witmeyer <switmeyer@crakmedia.com>
 */
class DefaultControllerProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['default.controller'] = $app->share(
            function () use ($app) {
                return new DefaultController(
                    $app['rest_normalizer.builder'],
                    $app['logger']
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
