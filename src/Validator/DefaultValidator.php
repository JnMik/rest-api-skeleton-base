<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Validator;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator;

/**
 * Class DefaultValidator
 *
 * @package  Crak\Api\DefaultNS\Validator
 * @author   Christophe Rosello <crosello@crakmedia.com>
 */
class DefaultValidator
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param $data
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface
     */
    public function validate($data)
    {
        $constraints = [
            new Assert\NotBlank(),
        ];

        return $this->validator->validateValue($data, $constraints);
    }
}
