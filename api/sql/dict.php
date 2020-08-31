<?php
namespace sql\dict;

include_once 'etc.php';//for debug config

class dictNode {
    private $id = null;
    private $value = null;
    private $level = null;
    private $children = array();
    private $parentId = null;
    
    function __construct($value, $level, $id) {
        $this->value = $value;
        $this->level = $level;
        $this->id = $id;
    }
    
    public function setParentId(&$value) {
        $this->parentId = $value;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getParentId() {
        return $this->parentId;
    }
    
    public function getChildren(){
        return $this->children;
    }
    
    public function getLevel() {
        return $this->level;
    }
    
    public function getValue(){
        return $this->value;
    }
    
    public function insert(&$val){
        array_push($this->children,$val);//TODO check for dupe
        $val->setParentId($this->id);
    }
}

class sqlDict{//TODO create a dictionary object. Contains all information on valid words
    private $dbName = '';
    private $sqlHierarchy = array();
    public $dictTree = null;//TODO change to private
    private $dictIds = [];
    
    function __construct($dbName, $dictFile='acceptedSql.txt'){
        $this->dbName = $dbName; //pobanion_plantproj
        $this->setDict($dictFile);
    }
    
    public function setDict($dictFile='acceptedSql.txt'){
        $fLoc = "./" . basename(__DIR__) . "/$dictFile";//TODO not sure if there is a better way to find the current directory
        $file = fopen($fLoc, "r");
        $inStream = strtolower(fread($file,filesize($fLoc)));
        fclose ($file);
    
        $numMatch = preg_match_all('/(\w*):\s*(\w*)/',$inStream, $match);//return num match TODO check there was something
        $match = array($match[1],$match[2]);
        
        $this->setHierarchy($inStream);

        //split array for only our db
        $match = $this->arraySub($match, "database", $this->dbName);

        //create parent at level 0
        $this->dictTree = $this->addNode($this->dbName, 0);
        $prevLevel = 0;
        $nPoint = $this->dictTree;
        
        foreach($match[1] as $point => $val){
            $level =  $this->sqlHierarchy[$match[0][$point]];
            $node = $this->addNode($match[1][$point], $level);
            if (bigdebug) {echo "level: $level, prevlevel: $prevLevel, val: $val ";}
            
            $sel = ($level-$prevLevel);
            
            switch(true) {
                case ($sel <= 0 ) ://relative, find the ancestor
                    $nPoint2 = $this->findNodeById($nPoint->getParentId());
                    while(($level - $nPoint2->getLevel()) != 1){
                        $nPoint2 = $this->findNodeById($nPoint2->getParentId());
                    }
                    $nPoint2->insert($node);
                    break;
                case ($sel == 1) ://is child
                    $nPoint->insert($node);
                    break;
                case ($sel > 1) ://error, current node is not a child of prev
                    \eHandle(500, $desc = "sql/dict.php error. $dictFile has incorrect line: $val");
                    break;
                default:
                    //give error
            }
            
            if (bigdebug) {echo " sel: $sel" .PHP_EOL;}
            
            $nPoint = $node;
            $prevLevel = $level;
        }
        if (bigdebug) {print_r($this->dictTree);}
    }
    
    private function arrayToLower($ar){
        foreach ($ar as $ptr => $val) {
            $ar[$ptr] = strtolower($val);
        }
        return $ar;
    }
    
    private function arrayFlatten($inAr, &$outAr = null){
        //flattens n-D array into 1-D array
        if($outAr === null){
            $outAr = [];
        }
        foreach ($inAr as $val){
            if (is_array($val)){
                $this->arrayFlatten($val, $outAr);
            }
            else{
                array_push($outAr, $val);
            }
        }
        return $outAr;
    }
    
    public function checkWord(...$parents){
        //flattens/converts to lower $parents then verifies that it is a proper pedigree (i.e. $parents = $db,$table,valid word)
        $parents = $this->arrayToLower($this->arrayFlatten($parents));
        return $this->checkPedigreeByValue($parents);
    }
    
    private function checkPedigreeByValue($nodes){//TODO test
        //recurses through $nodes, varifying that nodes[n+1]->value is a child of nodes[n]->value
        //returns if successfully able to go through entire $nodes array
        
        //print_r($this->findNodeByValue($nodes[0]));
        if (sizeof($nodes) == 1){
            return true;
        }
        else {
            $nextNode = $this->findNodeByValue($nodes[1]);  
            if (!isset($nextNode)){
                return false;
            }
            
            foreach ($this->findNodeByValue($nodes[0])->getChildren() as $child){//TODO there should be a better way to traverse this since we know who the parent is
                if ($child->getValue() == $nextNode->getValue()){
                    return $this->checkPedigreeByValue(array_slice($nodes, 1));
                }
            }
            return false;
        }
    }
    
  /*  private function checkPedigree($nodes): boolean{//TODO test
        //recurses through $nodes, varifying that nodes[n+1] is a child of nodes[n]
        //returns if successfully able to go through entire $nodes array
        if (sizeof($nodes) == 1){
            return true;
        }
        else {
            foreach ($nodes[0]->getChildren() as $child){
                if ($child == $nodes[1]){
                    return $this->checkPedigree(array_slice($nodes, 1));
                }
            }
            return false;
        }
    }*/
    
    private function addNode($value, $level) {
        $id = $this->getNewDictId();
        $node = new dictNode($value, $level, $id);
        array_push($this->dictIds, $id);
        
        return $node;
    }
    
    private function getNewDictId(){
        $bigVal = null;
        foreach ($this->dictIds as $i) {
            if ($i > $bigVal) {
                 $bigVal = $i;
            }
        }
        return ++$bigVal;
    }
  
    private function findNodeByValue($val, $node = null){
        if($node === null){
            $node = $this->dictTree;
        }
        //get node where $val = dictNode->value
        if($node->getValue() == $val){
            return $node;
        }else{
            $children = $node->getChildren();
            if(isset($children)) {
                foreach ($node->getChildren() as $child){
                    $rNode = $this->findNodeByValue($val, $child);
                    if(isset($rNode)){
                        return $rNode;
                    }
                }
            }
        }
    }
    
    private function findNodeById($id, $node = null){//TODO check to make sure this is working properly
        if($node === null){
            $node = $this->dictTree;
        }
        if($node->getId() != $id){
            $children = $node->getChildren();
            if(isset($children)) {
                foreach ($node->getChildren() as $child){
                    $rNode = $this->findNodeById($id, $child);
                    if(isset($rNode)){
                        return $rNode;
                    }
                }
            }
        }
        else{
            return $node;
        }
    }
    
    private function setHierarchy($hierString){
        /*Look at first line from $in string
        in format:  parent/child/subchild
        out format: [parent] => 0
                    [child] => 1
                    [subchild] => 2
        */
    
        $outAr = array();
        $dictStruct = strstr($hierString,"\n",true);
        if ($dictStruct === false){
            $dictStruct = $hierString;
        }
        
        preg_match_all('/(\w+)/',$dictStruct,$valAr);
        $outAr = $this->arrayFlip($valAr[0]);
        
       // if(debug){print_r ($outAr);}
        
        $this->sqlHierarchy = $outAr;
    }
    
    private function arraySub($inAr, $key, $comp){
    //  returns a sub array of $inAr starting at $inAr[0][i] = $key, $inAr[1][i] = $comp
    //  output array contains all valid words that are children of $key/$comp
    
        $state = 0;
        $dirLevel = $this->sqlHierarchy[$key];
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
                    //echo $val . ":" . $inAr[1][$adr] . PHP_EOL;
                    break;
                case 1://find end of values
                    //echo $struct[$val];
                    
                    if($this->sqlHierarchy[$val] <= $dirLevel){
                        $state = 2;
                        $arStop = $adr;
                        break 2;
                    }
                    break;
                case 2://should never be hit
                    break;
            }
        }
        $outAr[0] = array_slice($inAr[0], $arStart, $arStop-$arStart);
        $outAr[1] = array_slice($inAr[1], $arStart, $arStop-$arStart);
        return($outAr);
    }
    
    private function arrayFlip($inAr){
        foreach($inAr as $pointer => $i){
            $outAr[$i] = $pointer;
        }
        return $outAr;
    }
}
?>