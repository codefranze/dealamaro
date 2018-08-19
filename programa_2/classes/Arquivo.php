<?php

namespace amaro\arquivos;

abstract class Arquivo{

  protected $base;
	
  protected function setBase($base){
  	$this->base = $base;
  }
  
  protected function getBase(){
  	return $this->base;
  }

  public function setBaseProcessado(){
    $this->setBase("storage/processado/");	
  }
  
  public function setBaseProcessar(){
    $this->setBase("storage/processar/");	
  }
  
  public function setNome($nome){
	$this->nome = $nome;	
  }
	
  public function getNome(){
	 return $this->nome;
  }
  
  public function setConteudo($conteudo){
   $this->conteudo = $conteudo;
  }
	
  public function getConteudo(){
   return $this->conteudo;
  }  
  
  public function existe(){
	return file_exists($this->getBase() . $this->getNome());
  }
 	
  public function ler(){
   if($this->existe()){
	 $this->setConteudo(file_get_contents($this->getBase() . $this->getNome()));	
   }else{
   	 $this->setConteudo("");
   }	
  }
	
  public function salvar(){
    file_put_contents($this->getBase() . $this->getNome(), $this->getConteudo());
  }  
   
}
?>