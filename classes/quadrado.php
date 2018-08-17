<?php
namespace amaro\quadrados\perfeitos;

class Quadrado{
	
  private $content = null;
  private $dimensao = array();
  private $soma = array();
  private $valid = false;
  
  private function setDimensao(array $dimensao){
   $this->dimensao = $dimensao;
  }
  
  private function getDimensao(){
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
    
    $this->setDimensao($expLinCol);
      	
  }
  
  private function getLinhaCount(){
  	return count($this->getDimensao());
  }
  
  public function validarPerfeicao(){
  	
  	  	// SOMA LINHA
  	for($l = 0; $l < $this->getLinhaCount(); $l++){
  	 $cols = $this->getDimensao()[$l];
  	 $acumula = 0;
  	 for($c = 0; $c < count($cols); $c++ ){
  	  $acumula += $cols[$c];  	
  	 }
  	 $soma[] = $acumula;	
  	}
  	
  	// SOMA SOLUNA
  	for($l = 0; $l < $this->getLinhaCount(); $l++){
  	 $cols = $this->getDimensao()[$l];
  	 $acumula = 0;
  	 for($c = 0; $c < count($cols); $c++ ){
  	  $acumula += $cols[$c];  	
  	 }
  	 $soma[] = $acumula;	
  	}
  	
  }
  
  private function setValido($valido){
  	$this->valido = $valido;
  }
  
  public function getValido(){
  	return $this->valido;
  }

}
?>