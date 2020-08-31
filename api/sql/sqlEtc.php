<?php
namespace sql;

include_once 'etc.php';

function jsonToSqlFormatterAr($data){//TODO messy messy :(
    //input {"luminosity":"1","temperature":"5"}
    //output kvp array; 
    //result[column] => ('val1','val2')
    //result[values] => ('val1','val2')

    $fdata = json_decode($data, true);
    if (json_last_error() === JSON_ERROR_NONE){
        $a = array_keys($fdata);
        $column = '(';
        $values = '(';
        $last = end($a);
        foreach($a as $val){
            $column .=  "`$val`";
            $values .= "'$fdata[$val]'";
            if($val == $last){
                $column .= ")";
                $values .= ")";
            }else {
                $column .= ", ";
                $values .= ", ";
            }
        }
        
        if (bigdebug){echo "(sqlInteract.php) jsonToSqlFormatter(): '$result: column => $column, values => $values'" . PHP_EOL;}
        print_r($result);
        return $result;
        
    }else {//TODO replace with catch function
        echo "Json_last_error(): " . json_last_error() . PHP_EOL;
        return 0;
    }
}  

function jsonToSqlFormatterExpAr($data){
    //input {"luminosity":"1","temperature":"5"}
    //output $result = {luminosty
    $fdata = json_decode($data, true);//TODO try catch for verify json
    
    if (json_last_error() === JSON_ERROR_NONE){
            
    }
    else {
        //eHandle(500,) //TODO need to implement
    }

    //print_r ($fdata);
    
    return $fdata;
    
}

function sqlArgString($inAr){
    //Generates 3 strings 
    //$result[0] => (?,?,...?^n) from sizeof($inAr)
    //$result[1] => ($inArKey,?,...?^n)
    //$result[0] => ($inArVal,?,...?^n)
    
    $result = ['(','(','('];

    foreach ($inAr as $ptr => $val){
        $result[0] .= '?,';
        $result[1] .= $ptr . ',';
        $result[2] .= $val . ',';
    }
    foreach($result as $ptr => $val){
        $result[$ptr] = substr($result[$ptr],0,-1) . ')';
    }

    return $result;
}

function sqlArgStringSelect($inAr){
    //returns arraykeys from $inAr, comma seperated
    $outAr = '';
    foreach($inAr as $val){
        $outAr .= $val . ',';
    }
    
    $outAr = substr($outAr, 0, -1);
    
    return $outAr;
}

function sqlArgStringWhere($inAr){
    $outAr = ['',[]];
    foreach($inAr as $ptr => $word){
        switch($ptr%3){
            case 0://dict checked keyword
                $outAr[0] .= $word;
                break;
            case 1://value
                $outAr[0] .= '=?';
                array_push($outAr[1],$word);
                break;
            case 2://A conditional
                $outAr[0] .= " $word ";
                break;
        }
    }
    return $outAr;
}

function arrayKeyToIndex($inAr){
    //converts kvp array to indexed values. Loses information on the key
    $outAr = [];
    foreach ($inAr as $val){
        array_push($outAr, $val);
    }
    return $outAr;
}

function sqlAFlattenKey($inAr){
    //converts kvp array to output array containing all keys then all values
    //in:  [k1] => v1, [k2] => v2
    //out: [0-3] => {k1,k2,v1,v2}
    
    $out = array_keys($inAr);
    foreach($out as $i){
        array_push($out, $inAr[$i]);
    }

    return $out;

}

function arrayFlip($inAr){
    foreach($inAr as $pointer => $i){
        $outAr[$i] = $pointer;
    }
    return $outAr;
}

function arraySub($inAr, $struct, $key, $comp){//TODO moved to sqldict
/*  hiearchy determined from $struct array
 *  returns a sub array of $inAr starting at $inAr[0][i] = $key, $inAr[1][i] = $comp
 *  output array contains all valid words that are children of $key/$comp
 */
    $state = 0;
    $dirLevel = $struct[$key];
    if(!isset($dirLevel)){
        return "Error: could not find ($key)";//TODO replace with try catch throw
    }
    $arStart = sizeof($inAr[0]);
    $arStop = sizeof($inAr[0]);
    
    foreach($inAr[0] as $adr => $val){
        switch($state){
            case 0://find begin of values
                if(strcmp($inAr[1][$adr],$comp) == 0){
                    $state = 1;
                    $arStart = $adr+1;
                }
                echo $val . ":" . $inAr[1][$adr] . PHP_EOL;
                break;
            case 1://find end of values
                //echo $struct[$val];
                
                if($struct[$val] <= $dirLevel){
                    $state = 2;
                    $arStop = $adr;
                    break 2;
                }
                break;
            case 2://should never be hit
                break;
        }
    }
    echo "start:" . $arStart." end:" .$arStop.PHP_EOL;
    $outAr[0] = array_slice($inAr[0], $arStart, $arStop-$arStart);
    $outAr[1] = array_slice($inAr[1], $arStart, $arStop-$arStart);
    return($outAr);
}

function getSubString($string, $start, $end){
    //return the substring between $start-$end, not including $start/$end
    //i.e. getSubString("abcde", "a", "d") => "bc"
    
    $init = strpos($string, $start);
    if ($init === false){
        return false;
    }else{
        $init += strlen($start);
        $length = strpos($string, $end, $init) - $init;
        return substr($string,$init,$length);
    }
}

?>