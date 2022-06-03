<?php 

class datosPanelObj{
    private $_nombre = '';
    private $_titulo = '';
    
    
    //get y set
    public function __get($name) {
        return $this->{"_".$name};
    }
    public function __set($name, $value) {
        $this->{"_".$name} = $value;
    }

    function __construct(){
       
    }

}