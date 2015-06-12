#!/usr/bin/env php
<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Dbtlr\MigrationProvider\Provider\MigrationServiceProvider;
use Knp\Provider\ConsoleServiceProvider;

$app = new Silex\Application();

require __DIR__ . '/../app/config.php';

//Console
$app->register(
    new ConsoleServiceProvider(),
    array(
        'console.name' => 'DefaultServiceConsole',
        'console.version' => '0.1.0',
        'console.project_directory' => __DIR__ . "/.."
    )
);

//Migrations
$app->register(
    new MigrationServiceProvider(),
    array(
        'db.migrations.path' => __DIR__ . '/migrations',
        'db.migrations.table_name' => 'migration_versions_default_table',
    )
);

$console = & $app["console"];
$console->run();
