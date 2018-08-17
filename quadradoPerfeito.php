<?php 
   
   namespace amaro;
  
   require 'classes\Ambiente.php';
   require 'classes\Arquivo.php';
   require 'classes\Quadrado.php';
   require 'classes\Mensagem.php';
   
   use amaro\ambientes as ambientes;
   use amaro\arquivos as arquivos;
   use amaro\mensagens as mensagens;
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
   	 $pq->validarPerfeicao();
   	 
   	 unset($arq);
   	 unset($pq);
   	 	
   	}else{
   		echo "NO";
   	  // MENSAGEM	
   	}
   	
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