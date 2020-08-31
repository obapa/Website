<?php
require_once 'sql/sqlInteract.php';
    
function loginValidate($user){
    $serverName = "localhost";
    $username = "pobanion_patread";
    $password = "GaK;Wm!GB;DE";
    $dbName = "pobanion_userinfo";
    $tableName = "userinfo";

    try{
        $login = new sql\sqlInteract($serverName,$dbName,$username,$password);
        $login->setTable($tableName);
        $session = $login->selectDbq(['simPass'],"user=$user");
        
        if($session[0][simPass]==$_SERVER[HTTP_PASS] && ($session[0][simPass]!= null)){//TODO redo logic, make sure you can't match on null values
            return 1;
        }
        else {
            return 0;
        }
    }
    catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}
?>