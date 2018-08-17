<?php 

 namespace amaro;
 
 require 'classes/Arquivo.php';
 require 'classes/Processado.php';

 use amaro\arquivos as arquivos;
 
 // VERIFICA SE O NUMERO DE ARGUMENTOS
 if( $argc >= 3 ){

 // CAPTURA OS VALORES DOS ARGUMENTOS NECESSARIOS	
  $nome = $argv[1];
  $id = (string) $argv[2];
  
  $arqProcessado = new arquivos\Processado();
  $arqProcessado->setNome($nome);
  
  // SE ARQUIVO INFORMADO COMO ARGUMENTO EXISTIR EM PROCESSADOS
  if($arqProcessado->existe()){

  	$arqProcessado->ler();
  	
  	$conteudo = $arqProcessado->getConteudo();
  	
  	// SE HOUVER CONTEUDO
  	if(!empty($conteudo)){
  	 	
  	  $json = json_decode($conteudo);
  	  
  	  if(array_key_exists("products",$json)){
		
  	  	$produtos = json_encode($json->products);
  	  	$produtos = json_decode($produtos,true);
  	  	
  	  	if(array_key_exists($id,$produtos)){
       
  	  	 $produtoEncontrado = (object) $produtos[$id];
         
  	  	 foreach($json->products as $keyProd => $p){
  	  	  if($p->id !== $produtoEncontrado->id){
  	  	   foreach($p->tagsVector as $keyTags => $value){
  	  	     echo $produtoEncontrado->tagsVector[$keyTags] . " => " . $value;
  	  	     echo "\n";
  	  	   }
  	  	   echo "\n";
  	  	  }
  	  	 }
  	  	
  	  	}else{
  	  	 echo "O PRODUTO QUE VOCE ESTA BUSCANCO NAO EXISTE NA BASE";
  	  	}
  	  	
  	  }else{
  	  	echo "NAO EXISTEM PRODUTOS PARA BUSCA";
  	  }
  		
  	// SE NAO HOUNVER CONTEUDO	
  	}else{
  	 echo "ARQUIVO NÃO POSSUI CONTEUDO";	
  	}
  	
  // SE ARQUIVO INFORMADO COMO ARGUMENTO NAO EXISTIR EM PROCESSADOS 
  }else{
   echo "ARQUIVO NAO EXISTE"; 	
  }
 
  unset($arqProcessado);
  
 // NUMERO DE ARGUMETNOS NAO CONTEMPLA O NECESSARIO PARA EXECUCAO DO PROCESSAMENTO
 }else{
  echo "desculpa";	
 }
 
 exit(1);

?>