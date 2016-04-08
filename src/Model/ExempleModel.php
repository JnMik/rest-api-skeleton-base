<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jm
 * Date: 15-08-30
 * Time: 19:43
 * To change this template use File | Settings | File Templates.
 */

namespace Crak\Api\DefaultNS\Model;


use Support3w\Api\Generic\Model\DefaultModel;
use Support3w\Api\Generic\Model\ModelInterface;

class ExempleModel extends DefaultModel implements ModelInterface
{
    const LONG_NAME = __CLASS__;

    /**
     * @var integer
     */
    public $id;

    public $name;

    public $deleted = 0;

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
            'name' => $this->name,
            'deleted' => $this->deleted
        ];
    }

    public function loadFromArray($array) {

        if(isset($array['id'])) {
            $this->setId($array['id']);
        }

        if(isset($array['name'])) {
            $this->name = $array['name'];
        }

        if(isset($array['deleted'])) {
            $this->deleted = $array['deleted'];
        }

    }
}
