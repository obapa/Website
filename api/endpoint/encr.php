<?php
namespace encr;

class encr {
    
    function __contruct(){
        echo "";
    }
    
    public static function genDefKey(){
        include '/home4/pobanion/public_html/encr/Core.php';
        include '/home4/pobanion/public_html/encr/Key.php';
        include '/home4/pobanion/public_html/encr/Encoding.php';

        $key = \Defuse\Crypto\Key::createNewRandomKey();
        echo $key->saveToAsciiSafeString();
    }
}
?>