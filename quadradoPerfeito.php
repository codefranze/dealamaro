<?php 
   
   namespace amaro;
  
   require 'classes\Ambiente.php';
   require 'classes\Arquivo.php';
   require 'classes\Quadrado.php';
   
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
   	
   	$ar = new arquivos\Arquivo();
   	
   	$ar->setPath($path);
   	
   	if($ar->exists()){

   	 $ar->read();
   	 
   	 $pq = new perfeitos\Quadrado();
   	 
   	 $pq->setContent($ar->getContent());
   	 $pq->converterContent();
   	 $pq->validarPerfeicao();
   	 $pq->exibirMensagem();
   	 
   	 unset($pq);
   	 	
   	}else{
   	  echo "\n";
   	  echo "ARQUIVO INFORMADO NAO LOCALIZADO";
   	  echo "\n";
   	}
   	
   	unset($ar);
   	
   }
   
   }catch(ErrorException $e){
     echo $e->getMessage();
   }
    
   exit(1);
   
?>