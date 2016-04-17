<?php

namespace Api\Base\Provider;

use Silex\Application;
use Support3w\Api\Generic\DataObject\Controller;

/**
 * Class ControllerProvider
 *
 * @package Api\Base\Provider
 * @author  Olivier Beauchemin <obeauchemin@crakmedia.com>
 */
class ControllerProvider
{
    const NS = 'Api\Base\Controller\\';

    /**
     * @return array
     */
    public function registerControllers()
    {
        $controllers = [
            new Controller(self::NS . 'ExampleController'),
        ];

        return $controllers;
    }
}