<?php 

 namespace amaro;
 
 require 'classes/Arquivo.php';
 require 'classes/Processado.php';

 use amaro\arquivos as arquivos;
 
 function ordenador(array &$similares ){
   $c = count($similares);
    for($i=0;$i<$c;$i++){
     if($i < ($c-1)){
       if($similares[$i]->distancia > $similares[($i+1)]->distancia){
        $maior = $similares[$i];
        $similares[($i)] = $similares[($i+1)];
        $similares[($i+1)] = $maior;
        ordenador($similares);
        break;
       }
     }    	
   }
 }
 
 // VERIFICA SE O NUMERO DE ARGUMENTOS CONTEMPLA AS NECESSIDADES DO PROCESSO
 if( $argc >= 3 ){

 // CAPTURA OS VALORES DOS ARGUMENTOS	
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
  	 	
  	  $c = json_decode($conteudo, true);
  	  
  	  if(array_key_exists("products",$c)){
	   if(array_key_exists($id,$c["products"])){
         
	   	 $similares = array();
	   	
  	  	 $b = (object) $c["products"][$id];
        
  	  	 $c = json_decode($conteudo, false);
          
  	  	 foreach($c->products as $keyProd => $p){
  	  	 	
  	  	  // SE ID DO PRODUTO FOR DIFERENTE DO ID DE BUSCA EXECUTA PROCESSO DE CALCULO DE SIMILARIDADE
  	  	  if($p->id !== $b->id){
  	  	    
  	  	  	$acumulado = 0;
  	  	  	
  	  	    foreach($p->tagsVector as $keyTags => $value){
  	  	     $acumulado +=  pow(($b->tagsVector[$keyTags] - $value),2);
  	  	    }
  	  	    
  	  	   $d = sqrt($acumulado);
  	  	   $s = (1/(1+$d));
  	  	   $p->distancia = $s;
  	  	   $similares[] = $p;
  	  	   
  	  	  }
  	  	 }
  	  	 
  	  	 ordenador($similares);
  	  	 
  	  	 echo "\n";
  	  	 echo "\n";
  	  	 echo " PRODUTO ENCONTRADO: ";
  	  	 echo "\n";
  	  	 echo "\n";
  	  	 echo " ID: " . $b->id;
  	  	 echo "\n";
  	  	 echo " NOME: " . $b->name;
  	  	 echo "\n";
  	  	 echo "\n";
  	  	 
  	  	 echo " PRODUTOS SIMILARES: ";
  	  	 echo "\n";
  	  	 echo "\n";
  	  	 
  	  	 for($i=0; $i<=2;$i++){
  	  	  echo " " . ($i+1) . " - " . $similares[$i]->name . " d: " . $similares[$i]->distancia;
  	  	  echo "\n";
  	  	 }

  	  	 echo "\n";
  	  	
	    }else{
  	  	 echo "O PRODUTO QUE VOCE ESTA BUSCANCO NAO EXISTE NA BASE";
  	  	}
  	  	
  	  }else{
  	  	echo "NAO EXISTEM PRODUTOS PARA BUSCA";
  	  }
  		
  	// SE NAO HOUNVER CONTEUDO	
  	}else{
  	 echo "ARQUIVO N�O POSSUI CONTEUDO";	
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