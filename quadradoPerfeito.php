<?php

   set_error_handler(function( $errno, $errstr, $errfile, $errline, array $errcontext ){
  	
   	$errorStr = "ERROR DESCONHECIDO, COMUNIQUE O ADMINISTRADOR";
    $errorCode = -1000;
    $errorNo = $errno;
    $errorLine = $errline;
    $errorFile = $errfile;
    	
   	if (0 === error_reporting()) {
      return false;
    }
    
    $str = explode(":",$errstr);

    if(count($str) >= 1){
    	
      // TRATAMENTO FILE_GET_CONTENTS
      if(strpos($str[0],"file_get_contents") !== false){
      $errorStr = "ARQUIVO INFORMADO NAO LOCALIZADO";	
      }
    	
    }else{
      	
    }
    
    throw new ErrorException($errorStr, $errorCode, $errorNo, $errorFile, $errorLine);
    
   });

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
   
    	
    if($file = file_get_contents($path)){
     echo "arquivo";
    }else{
   
	    echo "\n";
	   	echo "|---------------------------------------------------|\n";
	   	echo "|                                                   |\n";
	   	echo "| ARQUIVO INFORMADO NAO LOCALIZADO                  |\n";
	   	echo "|                                                   |\n";
	   	echo "|---------------------------------------------------|\n";
	   	
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