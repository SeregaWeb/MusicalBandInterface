<?php
namespace lib;

class Instrument implements iInstrument
{
    private $instrument;
    private $classification;

    private function setInstrument($instrument){
        
        $instrument = trim($instrument);
        if( 0 < strlen($instrument)){
            $this->instrument = $instrument;
        }else{
            return false;
        }
    }

    private function setClassification($classification){
        
        $classification = trim($classification);
        if( 0 < strlen($classification)){
            $this->classification = $classification;
        }else{
            return false;
        }
    }

    public function addInstrument($instrument,$classification)
    {
        $this->setInstrument($instrument);
        $this->setClassification($classification);

        $inst = $this->getName();
        $class = $this->getCategory();

        if( false == $inst || false == $class){
            return UNCORECT_VALUE;
        }else{
            $str = "<br>Add ". $inst ."<br>Category ". $class;
            return $str;
        }
    }

    public function getName()
    {
        return $this->instrument;
    }

    public function getCategory()
    {
        return $this->classification;
    }
}