<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Controller;

use Crak\Api\DefaultNS\Repository\DefaultRepository;
use Crak\Api\DefaultNS\Validator\DefaultValidator;

/**
 * Class DefaultController
 *
 * @package  Controller
 * @author   Sylvain Witmeyer <switmeyer@crakmedia.com>
 */
class DefaultController extends Controller
{
    /**
     * @var \Crak\Api\DefaultNS\Repository\DefaultRepository
     */
    private $repository;

    /**
     * @var DefaultValidator
     */
    private $validator;

    /**
     * @param \Closure $responseBuilderClosure
     * @param DefaultRepository $repository
     * @param DefaultValidator $validator
     */
    public function __construct(
        \Closure $responseBuilderClosure,
        DefaultRepository $repository,
        DefaultValidator $validator
    ) {
        parent::__construct($responseBuilderClosure);

        $this->repository = $repository;
        $this->validator = $validator;
    }
}
