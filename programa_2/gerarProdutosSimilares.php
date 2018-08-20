<?php

 require 'classes\Tag.php';
 require 'classes\Arquivo.php';
 
 if( $argc >= 2 ){
 
 $nome = $argv[1];
 
 $arqProcessar = new Arquivo();
 
 $arqProcessar->setNome($nome);
 $arqProcessar->setBaseProcessar();
 
 if($arqProcessar->existe()){
     
 	 $arqProcessar->ler();
 	 
	 $conteudo = json_decode($arqProcessar->getConteudo());
	 $conteudoProcessado["products"] = array();
	 
	 foreach($conteudo->products as $key => $obj){

	 	$tag = new Tag();	 	
	 	$tag->setTagsLista($obj->tags);
	 	
	 	$obj->tagsVector = $tag->getVetor(); 
	    
	 	$conteudoProcessado["products"][(int)$obj->id] = $obj;
	    
	 	unset($tag);
	 	
	 }
	 
	 $conteudo = json_encode($conteudoProcessado);
	 
	 $arqProcessado = new Arquivo();
	 $arqProcessado->setNome($nome);
	 $arqProcessado->setBaseProcessado();
	 $arqProcessado->setConteudo($conteudo);
	 $arqProcessado->salvar();
	 
	 if($arqProcessado->existe()){
	   echo "ARQUIVO GERADO COM SUCESSO";	
	 }else{
	   echo "PROBLEMA AO GERAR AQUIVO";	
	 }
	 
	 unset($arqProcessado);
	 unset($arqProcessar);
	 
 }else{
  echo "O ARQUIVO INFORMADO COMO ARGUMENTO NÃO EXISTE";
 }

  // NUMERO DE ARGUMETNOS NAO CONTEMPLA O NECESSARIO PARA EXECUCAO DO PROCESSAMENTO
 }else{
  echo "O NUMERO DE ARGUMETNOS NAO CONTEMPLA O NECESSARIO PARA EXECUCAO DO PROCESSAMENTO";	
 }
 
 exit(1);
 
?>