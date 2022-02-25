<?php

namespace Tests\Functional;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;
use PHPUnit\Framework\TestCase;

class GetNumberTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
	 
    public function testGetnumber()
    {
 
         $getNumClass = new \App\Controllers\GetNumberController;
         $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/api/get',
            'QUERY_STRING'=>'number=1'
        ]);
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $response = new \Slim\Http\Response();
 
        $response = $getNumClass->getnum($request, $response);
        $this->assertSame((string)$response->getBody(), '{"number":"1"}');
    }

 
}
