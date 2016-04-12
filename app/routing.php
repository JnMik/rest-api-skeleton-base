<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

/** @var $app \Silex\Application */
/** @var $api \Silex\ControllerCollection */

// Declare Routes
$api = $app['controllers_factory'];

// RESOURCES EXAMPLE
$api->get('/resources/example',  'example.controller:fetchAll');
$api->post('/resources/example', 'example.controller:create');
$api->get('/resources/example/{id}', 'example.controller:findById');
$api->put('/resources/example/{id}', 'example.controller:update');
$api->delete('/resources/example/{id}', 'example.controller:delete');

// Mount routes
$app->mount($app['api.endpoint'] . $app['api.version'], $api);
