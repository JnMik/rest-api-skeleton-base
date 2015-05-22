<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Controller;

use Crak\Component\RestNormalizer\Builder\ResponseBuilder;

/**
 * Class Controller
 *
 * @package  Crak\Api\Domain\Controllers
 * @author   Christophe Rosello <crosello@crakmedia.com>
 */
abstract class Controller
{
    /**
     * @var \Closure
     */
    protected $responseBuilderClosure;

    /**
     * @param \Closure $responseBuilderClosure
     */
    public function __construct(\Closure $responseBuilderClosure)
    {
        $this->responseBuilderClosure = $responseBuilderClosure;
    }

    /**
     * @param mixed|null $object
     *
     * @return ResponseBuilder
     */
    public function invokeResponseBuilder($object = null)
    {
        return $this->responseBuilderClosure->__invoke($object);
    }
}
