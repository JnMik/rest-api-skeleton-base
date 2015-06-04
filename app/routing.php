<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

/** @var $app \Silex\Application */

//Declare Routes
$api = $app['controllers_factory'];
/** @var $api \Silex\ControllerCollection */

$api->get('/ping', "default.controller:ping");

$api->get('/default',  'default.controller:fetchAll');
$api->post('/default', "default.controller:create");
$api->get('/default/{id}', 'default.controller:findById');
$api->put('/default/{id}', "default.controller:update");
$api->delete('/default/{id}', "default.controller:delete");

//Mount routes
$app->mount($app['api.endpoint'].$app['api.version'], $api);
