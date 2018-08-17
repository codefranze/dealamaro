<?php
 namespace amaro\ambientes;

 class Ambiente{
 	
 	static function init(){
 		
	 set_error_handler( function( $errno, $errstr, $errfile, $errline, array $errcontext ){
	  	
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
	      	
	    }
	    
	    throw new ErrorException($errorStr, $errorCode, $errorNo, $errorFile, $errorLine);
	    
	   });
 		
 	}
 	
 }
?>