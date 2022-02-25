<?php

namespace App\Controllers;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use SlimBuild\Helper\Session;

class GetNumberController
{

    protected $container;
    public function __construct() {
        if(!isset($_SESSION["input"])) {
            $_SESSION["input"]=[]; 
           } 
    }

    public function getnum($request, $response)
    {
        $number = $request->getQueryParams('num')['number'];
		if(intval($number)){
			if(in_array($number,$_SESSION['input'])){
				for($i=1;$i<max($_SESSION['input'])+1;$i++){
					if(!in_array($number+$i,$_SESSION['input'])){
						$newNum =  $number+$i;
						array_push($_SESSION['input'],$newNum);
						break;
					}
				}
			}else{
				$newNum =  $number;
				array_push($_SESSION['input'],intval($newNum));
		 
			 
			}        
			// var_dump($_SESSION['input']);
			return $response->withJson(["number" => $newNum], 200);
		}else{
			return $response->withJson(["number" =>"input must be a number"], 500);
		}
    }
}