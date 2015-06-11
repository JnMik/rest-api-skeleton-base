<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class DefaultController
 *
 * @package  Controller
 * @author   Sylvain Witmeyer <switmeyer@crakmedia.com>
 */
class DefaultController extends Controller
{
    protected $logger;

    public function __construct(
        \Closure $responseBuilderClosure,
        $logger
    ) {
        parent::__construct($responseBuilderClosure, $logger);

        $this->logger = $logger;
    }

    public function ping()
    {
        return new JsonResponse(['status' => 'OK'], 200);
    }
}
