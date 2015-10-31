<?php

error_reporting(E_NONE);
ini_set("display_errors", 0);

class BestWorseScaling {
    private $_graph;
    private $_nodes = array();
    private $_comparisons = array();
    private $_factors   = array();
    private $_result = array();

    public function __construct($factors){
        $this->_factors = $factors;
        $this->_graph     = new Structures_Graph(true);
        foreach($factors as $factorID => $factor){
            $this->_nodes[$factor] = new Structures_Graph_Node();
            $this->_nodes[$factor]->setData($factor);
            $this->_graph->addNode($this->_nodes[$factor]);
        }
	}

    public function getComparisons(){
        return $this->_comparisons;
    }

    public function isDone(){
        return $this->_factors;
    }
    public function isNeedFull($objComparison){
        $this->getResult();
        if($this->_nodes[$objComparison->aAlt]->connectsTo($this->_nodes[$objComparison->bAlt]))
            return false;
        if($this->_nodes[$objComparison->bAlt]->connectsTo($this->_nodes[$objComparison->aAlt]))
            return false;

        return true;
    }
    public function addComparison($Comparison){
        $this->_comparisons[] = $Comparison;
        $worse = $Comparison->getWorse();
        $best = $Comparison->getBest();
        if($this->_nodes[$Best] === null){
            var_dump($best ." konnte nicht gefunden werden!");
        }
        if($this->_nodes[$worse] === null){
            var_dump($worse ." konnte nicht gefunden werden!");
        }
    }
    
    public function getResult(){
        if($this->_result != null)
            return $this->_result;
        $return = array();
        
        $this->_result = $return;
        return $return;
    }
}

 