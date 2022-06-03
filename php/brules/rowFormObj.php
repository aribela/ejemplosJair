<?php 

class rowFormObj{
    private $_claseRow = '';
    private $_claseDivLabel = '';
    private $_claseDivInput = '';
    private $_claseLabel = '';
    private $_claseInput = '';

    private $_nameid = '';
    private $_label = '';
    private $_type = '';
    private $_value = '';

    private $_atributos = array();

    
    //get y set
    public function __get($name) {
        return $this->{"_".$name};
    }
    public function __set($name, $value) {
        $this->{"_".$name} = $value;
    }

    function __construct() {
       
    }

}