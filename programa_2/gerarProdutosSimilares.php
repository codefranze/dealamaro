<?php

 require 'classes\Tag.php';
 require 'classes\Arquivo.php';
 
 // VERIFICA SE O NUMERO DE ARGUMENTOS CONTEMPLA AS NECESSIDADES DO PROCESSO
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
	 
	 $arqProcessado = new Arquivo();
	 
	 $arqProcessado->setNome($nome);
	 $arqProcessado->setBaseProcessado();
	 $arqProcessado->setConteudo($conteudoProcessado);
	 $arqProcessado->setConteudoJson();
	 $arqProcessado->salvar();
	 
	 if($arqProcessado->existe()){
	   echo "ARQUIVO GERADO COM SUCESSO";	
	 }else{
	   echo "PROBLEMA AO GERAR AQUIVO";	
	 }
	 
	 unset($arqProcessado);
	 
 }else{
  echo "O ARQUIVO INFORMADO COMO ARGUMENTO NÃO EXISTE";
 }
 
  unset($arqProcessar);

  // NUMERO DE ARGUMETNOS NAO CONTEMPLA O NECESSARIO PARA EXECUCAO DO PROCESSAMENTO
 }else{
 
 	echo "\n";
   	echo "  |---------------------------------------------------|\n";
   	echo "  |                                                   |\n";
   	echo "  | NUMERO DE ARGUMENTOS INFERIOR AO ESPERADO         |\n";
   	echo "  |                                                   |\n";
   	echo "  |---------------------------------------------------|\n";
   	echo "\n";
   	echo "  |---------------------------------------------------|\n";
   	echo "  |                                                   |\n";
   	echo "  | INSTRUCOES                                        |\n";
   	echo "  |                                                   |\n";
   	echo "  | Informe o nome do arquivo que deve ser            |\n";
   	echo "  | processado atraves da passagem de argumentos.     |\n";
   	echo "  |                                                   |\n";
   	echo "  |                                                   |\n";
   	echo "  | Exemplo 1:                                        |\n";
   	echo "  | php gerarProdutosSimilares.php produtos.txt       |\n";
   	echo "  |                                                   |\n";
   	echo "  |---------------------------------------------------|\n";
 }
 
 exit(1);
 
?>