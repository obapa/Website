<?php
namespace sql;

require_once 'etc.php';
require_once 'sql/sqlEtc.php';
require_once 'dict.php';

class sqlInteract{
    private $charset = 'utf8_unicode_ci';
    private $serverName = '';
    private $dbName = '';
    private $tableName = '';
    private $user = '';
    private $pass = '';
    private $sqlResp = '';
    private $options = [];
    private $conn = null;
    private $dict = null;
    private $dictScope = [];
    
    function __construct($serverName, $dbName, $user, $pass, $options = []){
        $this->serverName = $serverName; 
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
        $this->options = $options;
        $this->setDictScope();
        
        $this->dict = new dict\sqlDict($this->dbName);
        
        if(debug){
            if(bigdebug) {echo "(sqlInteract.php) constructor" . PHP_EOL;}
            $this->options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
        }
        try{
            $this->conn = new \PDO("mysql:host=$serverName;dbname=$dbName", $user, $pass, $options);
        }
        catch (\PDOException $e) {
            eHandle(500, $e, "sqlInteract.php");
        }
    }
    
    function __deconstruct(){
        $this->conn = null;
        $this->dict = null;
    }
    
    public function setDBCred($serverName, $dbName, $user, $pass){//TODO probably antiquated, will need to delete
        $this->serverName = $serverName; 
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
        $this->setDictScope();
    }
    
    public function setTable($table){
        $this->tableName = $table;
        $this->setDictScope();
    }
    
    public function setOption($option, $val){//TODO probably remove this
        $this->options[$option] = $val;
    }
    
    public function insertDbQ($values, $fetchMode = \PDO::FETCH_ASSOC){
    //runs INSERT INTO $this->tableName ? VALUES ? SQL query
    //$values is KVP array, ex:
    //  [luminosity] => 3002
    //  [temperature] => 30
        try{      
            if($this->checkSqlArg(array_keys($values))){
                $sqlArgStr = sqlArgString($values);
                $vals = arrayKeyToIndex($values);
                
                $stmt = "INSERT INTO $this->tableName $sqlArgStr[1] VALUES $sqlArgStr[0]";
                $sql = $this->conn->prepare($stmt);
            
                if(debug){echo $stmt . PHP_EOL;}
            
                $sql->execute($vals);
            }
            return 1;
        }
        catch(Exception $e){
            eHandle(500,$e);
            return 0;
        }
    }
    
    public function selectDbQ($values, $where = '1'){
    //runs SELECT ? FROM $this->tableName WHERE ?
    //$values is indexed array, ex:
    //  [0] => luminosity
    //  [1] => temperature
    //$where is string, accepts AND,OR,NOT conditionals
        if(debug){echo "SelectDbQ()" . PHP_EOL;}

        try{
            $where = \multiExplode(['and','or','not'], $where, true);
            $splitString = $this->genSqlWhereArray($where);

            if(isset($splitString)){
                $sqlArgStr = sqlArgStringSelect($values);
                
                $whereStr = sqlArgStringWhere($splitString);
                $stmt = "SELECT $sqlArgStr FROM $this->tableName WHERE $whereStr[0]";
                $sql = $this->conn->prepare($stmt);
                //print_r($whereStr[1]);
                $sql->execute($whereStr[1]);
                //echo $stmt . PHP_EOL;
                //print_r($sql->fetchAll());
                return $sql->fetchAll();
            }
            return null;
        }
        catch(Exception $e){
            eHandle(500,$e);
            return null;
        }
    }
   
    public function getSqlResp(){//TODO make
        return $this->sqlResp;
    }

    private function setDictScope(){
        $this->dictScope = [$this->dbName, $this->tableName];
    }
    
    private function checkWord($word){
        //wrapper for dict->checkWord()
        //returns true/false if $word is valid
        
         return $this->dict->checkWord($this->dictScope, $word);
    }
    
    private function genSqlWhereArray($where){
    //verifies that input string $where only uses valid words
    //input: $where is array of arguments or conditionals
    //output: $outWhere is array of each word split up, or null if anything is invalid
    //ex input: 
    //  $where[0] => luminosity=3
    //  $where[1] => AND
    //  $where[2] => temperature = '2'
    //output:
    //  $outWhere[0] => luminosity
    //  $outWhere[1] => 3
    //  $outWhere[2] => AND
    //  $outWhere[3] => temperature
    //  $outWhere[4] => 2
        if(debug){ "sqlInteract.php/genSqlWhereArray(): ". $where . PHP_EOL;}
        if($where == 1){
            return true;
        }else {
            $point = 0;
            $outWhere = [];
            foreach($where as $ptr => $val){
                foreach(explode('=', $val) as $substr){
                    switch($point%3) {
                        case 0://dict check word
                            $word = trim($substr, " \t\n\r\0\x0B`\"");
                            if($this->checkWord($word)){
                                array_push($outWhere, $word);
                            }
                            else{
                                return null;
                            }
                            break;
                        case 1://= val
                            array_push($outWhere,trim($substr, " \t\n\r\0\x0B"));
                            break;
                        case 2://conditional
                            $word = trim($substr, " \t\n\r\0\x0B");
                            if(preg_match('/(AND|OR|NOT)/i', $word)){
                                array_push($outWhere, $word);
                            }
                            else{
                                return null;
                            }
                            break;
                    }
                    $point++;
                }
            }
        return $outWhere;
        }
        
    }
    
    private function checkSqlArg($values){
        //verify all words in indexed array $values are valid
        
        foreach ($values as $word){
            if(!$this->checkWord($word)){
                eHandle(403, $loc = "api/sql/sqlInteract.php", $desc = "word '$word' is not a valid word for sqlDict '$this->dbName");
                return false;
            }
        }
        return true;
    }
}
?>