<?php
namespace lib;

class Musician implements iMusician
{
    private $instrument;
    private $type;
    private $name;

    private function setName($name)
    {
        $name = trim($name);
        if ( 0 < strlen($name )){
            $this->name = $name;
        }else{
            return false;
        }
    }

    private function setType($type)
    {
        $type = trim($type);
        if ( 0 < strlen($type )){
            $this->type = $type;
        }else{
            return false;
        }
    }

    private function setInstrument($obj)
    {
        $this->instrument = $obj;
    }

    public function addInstrument(iInstrument $obj)
    {
        if ( '' != $obj->getName()){
        $this->setInstrument($obj);
        }else{
            return false;
        }
    }

    public function getInstrument()
    {
        return $this->instrument->getName();
    }

    public function getMusicianType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addMusician($name, $type, iInstrument $obj){
        $this->setName($name);
        $this->setType($type);
        $this->setInstrument($obj);

        $n = $this->getName();
        $t = $this->getMusicianType();
        $o = $this->getInstrument();

        if ( false == $n || false == $t || false == $o){
            return UNCORECT_VALUE;
        }else{
            $str = 'add musician <br>Name - '.$n.' type  - '.$t.' <br>instrument - '.$o;
            return $str;
        }

    }

    public function assingToBand(iBand $nameBand)
    {
        $array = $nameBand->getMusician();
        $fName = $this->getName();
        $bName = $nameBand->getName();
        foreach( $array as $val ){
           $name = $val->getName();
           if ( $name == $fName ){
                return $fName." - ".MUSICIAN_YES." (".$bName.")";
            }
        }
        return $fName." - ". MUSICIAN_NO." (".$bName.")";
    }  
}