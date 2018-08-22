<?php 
   
   require 'classes\Arquivo.php';
   require 'classes\Quadrado.php';

   if($argc < 2){
   	
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
   	echo "  | processado atraves da passagem de                 |\n";
   	echo "  | argumentos.                                       |\n";
   	echo "  |                                                   |\n";
   	echo "  | Exemplo 1:                                        |\n";
   	echo "  | php quadradoPerfeito.php quadrado_perfeito.txt    |\n";
   	echo "  |                                                   |\n";
   	echo "  | Exemplo 2:                                        |\n";
   	echo "  | php quadradoPerfeito.php quadrado_imperfeito.txt  |\n";
   	echo "  |                                                   |\n";
   	echo "  |---------------------------------------------------|\n";
   	
   }else{
   	
   	$path = $argv[1];
   	
   	$ar = new Arquivo();
   	
   	$ar->setPath($path);
   	
   	if($ar->exists()){

   	 $ar->read();
   	 
   	 $q = new Quadrado();
   	 
   	 $q->setContent($ar->getContent());
   	 $q->converterContent();
   	 $q->validarPerfeicao();
   	 $q->exibirMensagem();
   	 
   	 unset($q);
   	 	
   	}else{
   	  echo "\n";
   	  echo "ARQUIVO INFORMADO NAO LOCALIZADO";
   	  echo "\n";
   	}
   	
   	unset($ar);
   	
   }
   
   exit(1);
   
?>