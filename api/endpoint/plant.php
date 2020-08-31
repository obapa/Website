<?php
namespace plant;

require_once 'sql/sqlInteract.php';
require_once 'sql/sqlEtc.php';
require_once 'etc.php';

class plant {
    private $serverName = "localhost";
    private $username = "pobanion_patmin";
    private $password = "al7rog52hd";
    private $dbName = "pobanion_plantproj";
    private $tableName = "planterinfo";
    
    private $data = '';
    private $request = '';
    
    function __construct(){
        $this->data = file_get_contents('php://input');
        $this->request = $_SERVER['REQUEST_METHOD'];
    }
    
    public function addtodb(){
        if (debug){ echo "(plant.addtodb())" . PHP_EOL . "Data:" . $this->data . PHP_EOL; }
        
        foreach (getallheaders() as $name => $value) {//TODO remove this all.
            echo "$name: $value".PHP_EOL;
        }
        
        try{
            $conn = new \sql\sqlInteract($this->serverName,$this->dbName,$this->username,$this->password);
            
            $conn->setTable($this->tableName);
            $data = \sql\jsonToSqlFormatterExpAr($this->data);

            $attempt = $conn->insertDbQ($data);
            $conn = null;
 
            if (debug){
                if(attempt){
                   echo "Success(api/plant.php)"; 
                }else{
                    echo "Failed (api/plant.php)";
                }
            }
        }
        catch(Exception $e){
            eHandle(400, $e);
        }
    }
    
    public function getfromdb(){
        
    }
    
    public function listDbColumns(){
        $conn = new \sql\sqlInteract($this->serverName,$this->dbName,$this->username,$this->password);
        $conn->setTable("`INFORMATION_SCHEMA`.COLUMNS");
        // SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.COLUMNS WHERE `TABLE_NAME` = N'planterinfo'
        
        $attempt = $conn->SelectDbQ($val = "`COLUMN_NAME`", $where = "`TABLE_NAME` = N'planterinfo'");
        foreach($attempt as $a){
            foreach($a as $b){
                echo "$b, ";
            }
        }

    }
}
?>