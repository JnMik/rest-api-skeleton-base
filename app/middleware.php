<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/** @var $app Application */

//Handling CORS preflight request
$app->before(
    function (Request $request) {
        if ($request->getMethod() === "OPTIONS") {
            $response = new Response();
            $response->headers->set("Access-Control-Allow-Origin", "*");
            $response->headers->set("Access-Control-Allow-Methods", "GET,POST,PUT,DELETE,OPTIONS");
            $response->headers->set("Access-Control-Allow-Headers", "Content-Type");
            $response->setStatusCode(200);
            return $response->send();
        }
    },
    Application::EARLY_EVENT
);

//handling CORS respons with right headers
$app->after(
    function (Request $request, Response $response) {
        $response->headers->set("Access-Control-Allow-Origin", "*");
        $response->headers->set("Access-Control-Allow-Methods", "GET,POST,PUT,DELETE,OPTIONS");
    }
);
