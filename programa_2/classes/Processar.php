<?php

namespace amaro\arquivos;

class Processar extends Arquivo{

	private $nome;
	private $base = "storage/processar/";
	private $conteudo;
	
	public function setNome($nome){
	 $this->nome = $nome;	
	}
	
	protected function getNome(){
	 return $this->nome;
	}
	
	protected function getBase(){
	 return $this->base;
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
	 }	
	}
	
	public function salvar(){}
	
}
?>