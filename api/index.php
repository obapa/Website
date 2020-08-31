<?php 
require_once 'etc.php';

if (bigdebug){//debug toggle in etc.php
    echo "(index.php)" .PHP_EOL;
    echo "Request URI" . $_SERVER['REQUEST_URI'] . PHP_EOL ;
    //print_r($_SERVER);
}

//TODO rewrite login security
include 'login.php';
if(loginValidate($_SERVER[HTTP_USER])==0){
    var_dump(http_response_code(401));
    exit("Error 401: Unauthorized, $_SERVER[HTTP_USER]");
}



//Scrub the endpoint 
$endpoint = uriClean($_SERVER['REQUEST_URI'], '/\/api\//');

if (debug){
    echo "endpoint: '" . $endpoint . PHP_EOL;
}


switch ($endpoint){
    
    case "plant/addtodb" : 
        launchPlant('addToDb');
        break;
    
    case "plant/listDbColumns" :
        launchPlant('listDbColumns');
        break;
    
    case "plant/getfromdb" :
        launchPlant('getfromdb');
        break;
        
    case "encr/genApiKey" : 
        //include 'endpoint/encr.php';
        //encr::genDefKey();
        launchEncr(genDefKey);
        break;
        
    /*case "test" :
        include 'test.php';
        break;*/
        
    default : 
        echo "UwU error 404 (api/index)";
        var_dump(http_response_code(404));
        break;
}
//echo "Success: HTTP 200";//TODO make this actually determine if the arg went through

function launchPlant($endpoint){
    include 'endpoint/plant.php';
    $end = new \plant\plant();
    call_user_func(array($end,$endpoint));
    $end = null;
}

function launchEncr($endpoint){
    include 'endpoint/encr.php';
    $end = new \encr\encr();
    call_user_function(array($end,$endpoint));
    $end=null;
}

?>