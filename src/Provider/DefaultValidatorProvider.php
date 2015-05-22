<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Provider;

use Crak\Api\DefaultNS\Validator\DefaultValidator;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Class DefaultValidatorProvider
 *
 * @package  Crak\Api\Default\Provider
 * @author   Christophe Rosello <crosello@crakmedia.com>
 */
class DefaultValidatorProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['default.validator'] = $app->share(
            function () use ($app) {
                return new DefaultValidator($app['validator']);
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
    }
}
