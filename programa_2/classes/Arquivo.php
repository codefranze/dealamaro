<?php

class Arquivo{

  protected $base;
  private $nome;
  private $conteudo;
	
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
  
  public function getConteudoJson(){
   return json_decode($this->getConteudo(),false);
  }
  
  public function setConteudoJson(){
   $this->setConteudo(json_encode($this->getConteudo()));
  }
  
  public function getConteudoArray(){
   return json_decode($this->getConteudo(),true);
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