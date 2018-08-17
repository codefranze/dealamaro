<?php

namespace amaro\arquivos;

abstract class Arquivo{
	
  abstract protected function getNome();
  abstract protected function getBase();
  abstract public function setNome($nome);
  abstract public function ler();
  abstract public function salvar();
  abstract public function existe();
  abstract public function getConteudo();
  abstract public function setConteudo($conteudo);
   
}
?>