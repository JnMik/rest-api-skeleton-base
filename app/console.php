#!/usr/bin/env php
<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

use Dbtlr\MigrationProvider\Provider\MigrationServiceProvider;
use Knp\Provider\ConsoleServiceProvider;
use Support3w\Api\Command\GenerateApiFromDb;
use Knp\Console\Application as ConsoleApplication;

require __DIR__ . '/../bootstrap.php';

// Console
$app->register(
    new ConsoleServiceProvider(),
    array(
        'console.name' => 'DefaultServiceConsole',
        'console.version' => '0.1.0',
        'console.project_directory' => __DIR__ . '/..'
    )
);

$console = & $app['console'];

/**
 * @var ConsoleApplication $console
 */
$console->add(new GenerateApiFromDb($app['db.options']));


// Migrations
/*
$app->register(
    new MigrationServiceProvider(),
    array(
        'db.migrations.path' => __DIR__ . '/migrations',
        'db.migrations.table_name' => 'migration_versions_default_table',
    )
);
*/


$console->run();
