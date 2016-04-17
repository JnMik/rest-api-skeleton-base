<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jm
 * Date: 15-08-30
 * Time: 19:43
 * To change this template use File | Settings | File Templates.
 */

namespace Api\Base\Model;

use Support3w\Api\Generic\Model\DefaultModel;
use Support3w\Api\Generic\Model\ModelInterface;

/**
 * Class ExampleModel
 *
 * @package Api\Base\Model
 */
class ExampleModel extends DefaultModel implements ModelInterface
{
    const LONG_NAME = __CLASS__;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $deleted;
    
    
    public function __construct()
    {
        $this->deleted = 0;
    }
}
