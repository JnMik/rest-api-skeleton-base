<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 * 
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Yaml\Parser;

/**
 * Class DbalConnection
 *
 * @package  Crak\Api\DefaultNS
 * @author   Christophe Rosello <crosello@crakmedia.com> 
 */
class DbalConnection 
{
    /**
     * @throws \RuntimeException
     * @return \Doctrine\DBAL\Connection
     */
    public static function create()
    {
        $file = __DIR__. "/config.yml";
        if (!is_readable($file))
        {
            throw new \RuntimeException('config.yml missing');
        }

        $parser = new Parser();
        $config = $parser->parse(file_get_contents($file));

        $connection = DriverManager::getConnection(
            $config['dbal'],
            new Configuration()
        );

        return $connection;
    }
} 