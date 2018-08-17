<?php

 namespace amaro;
 
 require 'classes\Tag.php';
 require 'classes\Arquivo.php';
 require 'classes\Processar.php';
 require 'classes\processado.php';
 
 use amaro\tags as tags; 
 use amaro\arquivos as arquivos;
 
 $nome = $argv[1];
 
 $arqProcessar = new arquivos\Processar();
 
 $arqProcessar->setNome($nome);
 
 if($arqProcessar->existe()){
     
 	 $arqProcessar->ler();
 	 
	 $conteudo = json_decode($arqProcessar->getConteudo());
	 
	 foreach($conteudo->products as $key => $obj){

	 	$tag = new tags\Tag();	 	
	 	$tag->setTagsLista($obj->tags);
	 	
	 	$obj->tagsVector = $tag->getVetor(); 
	    
	    $conteudo->products[$key] = $obj;
	 	
	 	unset($tag);
	 	
	 }
	 
	 $conteudo = json_encode($conteudo);
	 
	 $arqProcessado = new arquivos\Processado();
	 $arqProcessado->setNome($nome);
	 $arqProcessado->setConteudo($conteudo);
	 $arqProcessado->salvar();
	 
	 unset($arqProcessado);
	 unset($arqProcessar);
	 
 }else{
 	
 }

?>