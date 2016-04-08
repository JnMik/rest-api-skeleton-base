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

//$api->get('/ping', "default.controller:ping");

$api->get('/exemple',  'exemple.controller:fetchAll');
$api->post('/exemple', "exemple.controller:create");
$api->get('/exemple/{id}', 'exemple.controller:findById');
$api->put('/exemple/{id}', "exemple.controller:update");
$api->delete('/exemple/{id}', "exemple.controller:delete");


//Mount routes
$app->mount($app['api.endpoint'].$app['api.version'], $api);
