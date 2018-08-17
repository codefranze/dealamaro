<?php 
namespace amaro\arquivos;

class Arquivo{
 
 private $path;
 private $content;
 private $mensagem;
 
 private function setContent($content){
  $this->content = $content;
 }
 public function getContent(){
  return $this->content;  
 }
 
 public function setPath($path){
  $this->path = $path;	
 }
 
 public function getPath(){
  return $this->path;
 }
 
 public function exists(){
  return file_exists($this->path);
 }
 
 public function read(){
  $this->setContent(file_get_contents($this->getPath()));
 }
 
 private function setMensagem($mensagem){
  $this->mensagem = $mensagem;	
 }
 
	
}
?>