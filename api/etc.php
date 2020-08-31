<?php

/*-----------
TODO:
    implement error catching/HTTP output
    Debug levels
    clean old functions
    implement LM API calls
    clean up random echos
    add better credential security
    organize files, move some functions over
    garbage collection/verify I am destroying sql connection
    restrict HTTP request verbs
*/
/*-----------------------
debug levels(OR logic):
1: path trace
2:
4:
8:

---------------------*/
const debug = true;//TODO create bigdebug
const bigdebug = false;

function eHandle($throwCode, $error = '', $loc = '', $desc = ''){
    var_dump(http_response_code(intval($throwCode)));
    echo "HTTP: $throwCode" . PHP_EOL;
    
    if(debug){
        //echo ("Error exception: " . $error->getMessage() . PHP_EOL);
        //print_r($error);
        echo "Location: " . $loc . PHP_EOL;
        echo "Description: " . $desc . PHP_EOL;
    }
    exit();
    return 0;
}

function uriClean ($uri, $filter){
    $chopped = preg_replace($filter, '' , $uri);// chop /api/
    $chopped = preg_replace('/\.php$/', '' , $chopped);// chop.php
    return $chopped;
}

function multiExplode(array $delimeter, $inString, $ignoreCase = false){
    $outString = [];
    
    if($ignoreCase){
        $inString = explode(strtolower($delimeter[0]), strtolower($inString));
    }
    else{
        $inString = explode($delimeter[0], $inString);
    }

    arrayInsert($inString, $delimeter[0]);

    if(array_key_exists(1,$delimeter)){
        foreach($inString as $string){
            //echo $string .PHP_EOL;
            $outString = array_merge($outString,multiExplode(array_slice($delimeter, 1),$string, $ignoreCase));
        }
        return $outString;
    }
    else{
        return $inString;
    }
}

function arrayInsert(array &$inAr, $val){
    $outAr = [];
    foreach($inAr as $in){
        array_push($outAr, $in, $val);
    }
    $inAr = array_slice($outAr,0,-1);
}

/*function multiExplode(array $delimeter, $inString, $ignoreCase = false){
    $outString = [];
    
    if($ignoreCase){
        $inString = explode(strtolower($delimeter[0]), strtolower($inString));
    }
    else{
        $inString = explode($delimeter[0], $inString);
    }
    
    if(array_key_exists(1,$delimeter)){
        foreach($inString as $string){
            //echo $string .PHP_EOL;
            $outString = array_merge($outString,multiExplode(array_slice($delimeter, 1),$string));
        }
        return $outString;
    }
    else{
        return array_merge($outString, $inString);
    }
}*/

?>