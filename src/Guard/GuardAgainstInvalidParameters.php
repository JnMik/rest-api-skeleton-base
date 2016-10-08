<?php
/**
 * Created by PhpStorm.
 * User: jm
 * Date: 08/10/16
 * Time: 12:42 AM
 */

namespace Api\Base\Guard;


use Api\Base\Exception\MissingParameterException;

class GuardAgainstInvalidParameters {

    /**
     * @var array
     */
    private $parameters;
    /**
     * @var array
     */
    private $requiredParameters;

    public function __construct(array $parameters, array $requiredParameters) {
        $this->parameters = $parameters;
        $this->requiredParameters = $requiredParameters;
    }

    /**
     * @throws \Api\Base\Exception\MissingParameterException
     */
    public function guard() {
        foreach($this->requiredParameters as $requiredParameter) {
            if(!isset($this->parameters[$requiredParameter])) {
                throw new MissingParameterException('Required parameters : ' . implode(',', $this->requiredParameters));
            }
        }
    }
}