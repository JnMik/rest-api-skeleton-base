<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 * 
 * @copyright 2015 Crakmedia
 */

namespace Crak\Api\DefaultNS;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Migrations\Configuration\Configuration;

/**
 * Class MigrationConfiguration
 *
 * @package  Crak\Api\DefaultNS
 * @author   Christophe Rosello <crosello@crakmedia.com> 
 */
class MigrationConfiguration 
{
    public static function create(Connection $connection)
    {
        $directory = __DIR__."/../app/migrations";

        $configuration = new Configuration($connection);
        $configuration->setMigrationsNamespace('DoctrineMigrations');
        $configuration->setMigrationsTableName('migrations');

        $configuration->setMigrationsDirectory($directory);
        $configuration->registerMigrationsFromDirectory($directory);

        return $configuration;
    }
} 