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
    
  	$expLin = explode(chr(10),$this->getContent());
    $expLinCol = array();
    for($i = 0; $i < count($expLin); $i++){
      $expCol = explode(chr(32),$expLin[$i]);
      if(count($expCol) > 1){
       $expLinCol[$i] = explode(chr(32),$expLin[$i]);
      }
    }
      	
  }

}
?>