<?php
namespace amaro\quadrados;

class Quadrado{
	
  private $content = null;
  private $dimensao = array();
  private $soma = array();
  private $valido = true;
  private $numeroColunas = 0;
  private $numeroLinhas = 0;
  private $mensagem = null;
  
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
    
  public function converterContent(){
    
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
  	
  	// VALIDACAO DO NUMERO DE COLUNAS POR LINHA
  	$qtdCols = 0;
  	for($l = 0; $l < $this->getLinhaCount(); $l++){
  	  if($l === 0){
  	  	$qtdCols = count($this->getDimensao()[$l]);
  	  }else{	
  	  	if($qtdCols !== count($this->getDimensao()[$l])){
  	  	  $this->setValido(false);
  	  	  $this->setMensagem("O QUADRADO NÃO E PERFEITO DEVIDO AO NUMERO DIFERENTE DE COLUNAS POR LINHA");
  	  	}
  	  }
  	 $this->setNumeroColunas($qtdCols);
  	}
  	
  	if($this->getValido()){
  	  	  $this->setMensagem("O QUADRADO E PERFEITO");
  		
  	 // VALIDACAO DE NUMERO DE LINHAS X COLUNAS
  		
  	}
  	
  	// SOMA LINHA
  	/* for($l = 0; $l < $this->getLinhaCount(); $l++){
  	 $cols = $this->getDimensao()[$l];
  	 $acumula = 0;
  	 for($c = 0; $c < count($cols); $c++ ){
  	  $acumula += $cols[$c];  	
  	 }
  	 $soma[] = $acumula;	
  	} */
  	
  	// SOMA SOLUNA
  	/*
  	for($l = 0; $l < $this->getLinhaCount(); $l++){
  	 $cols = $this->getDimensao()[$l];
  	 $acumula = 0;
  	 for($c = 0; $c < count($cols); $c++ ){
  	  $acumula += $cols[$c];  	
  	 }
  	 $soma[] = $acumula;	
  	}*/
  	
  }
  
  private function setValido($valido){
  	$this->valido = $valido;
  }
  
  private function getValido(){
  	return $this->valido;
  }
  
  private function setNumeroColunas($numeroColunas){
   $this->numeroColunas = $numeroColunas;	
  }
  
  private function getNumeroColunas(){
  	return $this->numeroColunas;
  }
  
  private function setNumeroLinhas($numeroLinhas){
   $this->numeroLinhas = $numeroLinhas;
  }
  
  private function getNumeroLinhas(){
   return $this->numeroLinhas;
  }
  
  private function setMensagem($mensagem){
   $this->mensagem = $mensagem;
  }
  
  private function getMensagem(){
  	return $this->mensagem;
  }
  
  public function exibirMensagem(){
  	echo "\n";
    echo $this->getMensagem();	
  	echo "\n";
  }

}
?>