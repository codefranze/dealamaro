<?php
namespace amaro\quadrados\perfeitos;

class Quadrado{
	
  private $content;
  private $dimensao;
	
  private function setDimensao(array $dimensao){
   $this->dimensao = $dimensao;
  }
  
  public function getDimensao(){
  	return $this->dimensao;
  }
  
  public function setContent($content){
  	$this->content = $content;
  }
  
  private function getContent(){
  	return $this->content;
  }
    
  public function convertContentDimensao(){
   
  	$exp = explode(chr(32),$this->getContent());
   
    $this->setDimensao($exp);
      	
  }

}
?>