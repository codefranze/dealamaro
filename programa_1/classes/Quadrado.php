<?php
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
    $this->setNumeroLinhas(count($expLinCol));
    
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
  	  	  $this->setMensagem("O QUADRADO NAO E PERFEITO DEVIDO AO NUMERO DIFERENTE DE COLUNAS POR LINHA");
  	  	}
  	  }
  	 $this->setNumeroColunas($qtdCols);
  	}
  	
  	if($this->getValido()){
  	  	
  	 // VALIDACAO DE NUMERO DE LINHAS X COLUNAS
  	  if($this->getNumeroColunas() === $this->getNumeroLinhas()){
  	  	
  	   // SOMA POR LINHA
  	   for($l = 0; $l < $this->getLinhaCount(); $l++){
  	    $cols = $this->getDimensao()[$l];
  	    $acumula = 0;
  	    for($c = 0; $c < count($cols); $c++ ){
  	     $acumula += $cols[$c];  	
  	    }
  	    $soma[] = $acumula;	
  	   }
  	   
  	   // SOMA POR COLUNA 
  	   for($c = 0; $c < $this->getNumeroColunas(); $c++){
  	   	$acumula = 0;
  	   	for($l = 0; $l < $this->getNumeroLinhas(); $l++){
  	   	 $acumula += $this->getDimensao()[$l][$c]; 	
  	   	}
  	   	$soma[] = $acumula;
  	   }
  	   
  	   // SOMA PRIMEIRA DIAGONAL
  	   $acumula = 0;
  	   $col = 0;
  	   for($l = 0; $l < $this->getNumeroLinhas(); $l++){
  	   	$acumula += $this->getDimensao()[$l][$col];
  	   	$col++;
  	   }
  	   $soma[] = $acumula;
  	   
  	   // SOMA SEGUNDA DIAGONAL
  	   $acumula = 0;
  	   $col = ($this->getNumeroColunas()-1);
  	   for($l = 0; $l < $this->getNumeroLinhas(); $l++){
  	   	$acumula += $this->getDimensao()[$l][$col];
  	   	$col--;
  	   }
  	   $soma[] = $acumula;
  	   
  	   $this->setSoma($soma);
  	   
  	   // VALIDA IGUALDADE DAS SOMAS
  	   if($this->validarSoma()){
  	   	$this->setValido(true);
  	    $this->setMensagem("O QUADRADO E PERFEITO");
  	   }else{
  	  	$this->setValido(false);
  	  	$this->setMensagem("O QUADRADO NAO E PERFEITO");
  	   }
  	  	
  	  }else{
  	  	$this->setValido(false);
  	  	$this->setMensagem("O QUADRADO NAO E PERFEITO DEVIDO AO NUMERO DE LINHAS SER IGUAL DE COLUNAS");
  	  }	
  		
  	}
  	
  }
  
  private function validarSoma(){
  	$valor = 0;
  	for($i=0; $i<$this->getSomaCount();$i++){
  	 if($i == 0){
      $valor = $this->getSoma()[$i];
  	 }else{
  	  if($valor !== $this->getSoma()[$i]){
  	    return false;
  	   }	
  	  }
  	}
  	return true;
  }
  
  private function getSomaCount(){
  	return count($this->getSoma());
  }
  
  private function setSoma(array $soma){
   $this->soma = $soma;	
  }
  
  private function getSoma(){
  	return $this->soma;
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