<?php

error_reporting(E_ALL - E_NOTICE - E_WARNING);
//error_reporting(E_NONE);   
ini_set("display_errors", 1);


class Comparison {
    public $_id 	 = "";
    public $_optionA = "";
    public $_optionB = "";
	public $_optionC = "";
	public $_optionD = ""; 
    public $_best 	 = "";
	public $_worse   = "";

    public function __construct($id, $optionA, $optionB, $optionC, $optionD){
        $this->_id = $id;
        $this->_optionA = $optionA;
        $this->_optionB = $optionB;
		$this->_optionC = $optionC;
		$this->_optionD = $optionD;
		
    }
    public function setBest($best){
        $this->_best = $best;
    }
    public function getBest(){
        return $this->_best;
    }
	public function setWorse($worse){
		$this->_worse = $worse;
	}
    public function getWorse(){
        return $this->_worse;
	}
	
       
}