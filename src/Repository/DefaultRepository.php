<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS\Repository;

use Crak\Api\DefaultNS\DefaultModel\DefaultModel;
use Doctrine\DBAL\Connection;

/**
 * Class DefaultRepository
 *
 * @package  Crak\Api\DefaultNS\Repository
 * @author   Sylvain Witmeyer <switmeyer@crakmedia.com>
 */
class DefaultRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $connection;

    /**
     * @var string
     */
    private $table;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->table = 'default_table';
    }

    /**
     * return DefaultModel[]
     */
    public function fetchAll()
    {
        //TODO: implement
    }

    /**
     * @param integer $id
     * @return DefaultModel|null
     */
    public function findById($id)
    {
        //TODO: implement
    }

    /**
     * @param array $params
     * @return DefaultModel[]|null
     */
    public function findByParameters($params)
    {
        //TODO: implement
    }

    /**
     * @param DefaultModel $default
     * @return DefaultModel
     */
    public function create(DefaultModel $default)
    {
        //TODO: implement
    }

    /**
     * @param DefaultModel $default
     * @return int
     */
    public function update(DefaultModel $default)
    {
        //TODO: implement
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        //TODO: implement
    }
}
