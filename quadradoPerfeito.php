<?php 
   
   namespace amaro;
  
   require 'classes\ambiente.php';
   require 'classes\arquivo.php';
   require 'classes\quadrado.php';
   
   use amaro\ambientes as ambientes;
   use amaro\arquivos as arquivos;
   use amaro\quadrados\perfeitos as perfeitos;

   ambientes\Ambiente::init();
   
   try{
   	
   if($argc < 2){
   	
   	echo "\n";
   	echo "|---------------------------------------------------|\n";
   	echo "|                                                   |\n";
   	echo "| NUMERO DE ARGUMENTOS INFERIOR AO ESPERADO         |\n";
   	echo "|                                                   |\n";
   	echo "|---------------------------------------------------|\n";
   	echo "\n";
   	echo "|---------------------------------------------------|\n";
   	echo "|                                                   |\n";
   	echo "| INSTRUCOES                                        |\n";
   	echo "|                                                   |\n";
   	echo "| Informe o nome do arquivo que deve ser            |\n";
   	echo "| processado atraves da passagem de                 |\n";
   	echo "| argumentos.                                       |\n";
   	echo "|                                                   |\n";
   	echo "| Exemplo:                                          |\n";
   	echo "| php quadradoPerfeito.php quadrado.txt             |\n";
   	echo "|                                                   |\n";
   	echo "|---------------------------------------------------|\n";
   	
   }else{
   	
   	$path = $argv[1];
   	
   	$arq = new arquivos\Arquivo();
   	
   	$arq->setPath($path);
   	
   	if($arq->exists()){

   	 $arq->read();
   	 
   	 $pq = new perfeitos\Quadrado();
   	 
   	 $pq->setContent($arq->getContent());
   	 $pq->convertContentDimensao();
   	 print_r($pq->getDimensao());
   	 
   	 
   	 unset($arq);
   	 unset($pq);
   	 	
   	}else{
   		echo "NO";
   	  // MENSAGEM	
   	}
   	
   	/*
   	$path = $argv[1];
    $handler = fopen($path,"r");
    	
    if($handler){
        
    	$quadrado = array();
        
    	while(!feof($handler)){
    	 $line = fgets($handler);
    	 $col = explode(chr(32),$line);
    	}
    	
    	$q = new perfeitos\Quadrado();
    	
    	$q->valid();
    	
    	fclose($handler);
    	
    	
    	
    }else{
   
	    echo "\n";
	   	echo "|---------------------------------------------------|\n";
	   	echo "|                                                   |\n";
	   	echo "| ARQUIVO INFORMADO NAO LOCALIZADO                  |\n";
	   	echo "|                                                   |\n";
	   	echo "|---------------------------------------------------|\n";
	   	
    }
    	*/
    }
    
   }catch(ErrorException $e){
   	   
	    echo "\n";
	   	echo "|---------------------------------------------------|\n";
	   	echo "|                                                   |\n";
	   	echo "| ";
	   	echo $e->getMessage();
	   	echo "|\n";
	   	echo "|                                                   |\n";
	   	echo "|---------------------------------------------------|\n";
   	
   }
    
   exit(1);
   
?>