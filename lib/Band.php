<?php
namespace lib;

class Band implements iBand
{
    private $name;
    private $ganre;
    private $musician = array();


    private function setName($name)
    {
        $name = trim($name);
        if( 0 < strlen($name)){
            $this->name = $name;
        }else{
            return false;
        }
    }
    private function setGanre($ganre)
    {
        $ganre = trim($ganre);
        if( 0 < strlen($ganre)){
            $this->ganre = $ganre;
        }else{
            return false;
        }
    }
    private function setMusician($musician)
    {
        array_push($this->musician,$musician);
    }
    public function getName()
    {
       return $this->name;
    }
    public function getGenre()
    {
       return $this->ganre;
    }
    public function addMusician(iMusician $obj)
    {
        $validationName = $obj->getName();
        $n = $this->getName();
        $g = $this->getGenre();
        
        if( false != $n && false != $g && '' != $n && '' != $g){
            if ( '' != $validationName){
                $this->setMusician($obj);
               
                $str = '<br>add musician '. $validationName .'<br>Band '. $n ."<br>Ganre ". $g;
                return $str;
            }else{
                return UNCORECT_VALUE;
            }
        }else{
            return BAND_NOT_FOUND;
        }

        
       
    }

    public function addBand($name, $ganre){
        $this->setName($name);
        $this->setGanre($ganre);

        $n = $this->getName();
        $g = $this->getGenre();

        if ( false == $n || false == $g ){
            return UNCORECT_VALUE;
        }else{
            $str = '<br>add Band <br>Name - '.$n.' Ganre  - '.$g;
            return $str;
        }
    }

    public function getMusician()
    {
       return $this->musician;
    }

    public function showBand(){
        $array = $this->getMusician();
        $bName = $this->getName();
        $bGanre = $this->getGenre();
        $str = "<br>Band - ".$bName."<br>Genre - ".$bGanre;
        $strMusicant = '';
        foreach( $array as $val ){
           $strMusicant.= 'Name - '.$val->getName().' Type - '.$val->getMusicianType().' Instrument - '.$val->getInstrument()."<br>";
        }
        $str = $str."<br>".$strMusicant;
        return $str; 
    }

}