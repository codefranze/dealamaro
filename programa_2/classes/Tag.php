<?php

//namespace classes;

class Tag {

  private $tags = array( 'neutro', 'veludo', 'couro', 'basics', 'festa', 'workwear', 'inverno', 'boho', 'estampas', 'balada', 'colorido', 'casual','liso', 'moderno', 'passeio', 'metal', 'viagem', 'delicado', 'descolado', 'elastano' );
  private $tagsLista = array();
  
  private function getTags(){
   return $this->tags;
  }
  
  private function getTagsCount(){
   return count($this->getTags());
  }
  
  public function setTagsLista($tagsLista){
   $this->tagsLista	= $tagsLista;
  }
  
  private function getTagsLista(){
   return $this->tagsLista;
  }
  
  private function getTagsListaCount(){
   return count($this->tagsLista);
  }
  
  public function getVetor(){
   $vetor = array();
   for($i=0;$i<$this->getTagsCount();$i++){
    $vetor[] =(in_array($this->getTags()[$i],$this->getTagsLista())?1:0);
   }
   return $vetor;
  }
	
}
?>