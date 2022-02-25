<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use SlimBuild\Helper\Session;

return function (App $app) {

    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        
    });
    $app->get('/api', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        
    });
		
	$app->get("/api/get[/{num}]", 'GetNumberController:getnum');	
};
