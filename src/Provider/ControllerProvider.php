<?php

namespace Crak\Api\DefaultNS\Provider;

use Silex\Application;
use Support3w\Api\Generic\DataObject\Controller;

/**
 * Class ControllerProvider
 *
 * @package Crak\Api\DefaultNS\Provider
 * @author  Olivier Beauchemin <obeauchemin@crakmedia.com>
 */
class ControllerProvider
{
    const NS = 'Crak\Api\DefaultNS\Controller\\';

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