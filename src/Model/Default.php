<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\DefaultModel;


/**
 * Class DefaultModel
 *
 * @package  Model
 * @author   Christophe Rosello <crosello@crakmedia.com>
 */
class DefaultModel implements \JsonSerializable
{
    const LONG_NAME = __CLASS__;

    /**
     * @var integer
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     *
     * @return DefaultModel
     * @throws \InvalidArgumentException
     * @throws \BadMethodCallException
     */
    public function setId($id)
    {
        if ($this->id !== null) {
            throw new \BadMethodCallException("The ID for this model has been set already");
        }

        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException("ID is invalid");
        }

        $this->id = $id;

        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
        ];
    }
}
