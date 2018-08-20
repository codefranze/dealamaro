<?php

class Until{

  public function ordenarSimilares(array &$similares){
   $c = count($similares);
    for($i=0;$i<$c;$i++){
     if($i < ($c-1)){
       if($similares[$i]->distancia > $similares[($i+1)]->distancia){
        $maior = $similares[$i];
        $similares[($i)] = $similares[($i+1)];
        $similares[($i+1)] = $maior;
        $this->ordenarSimilares($similares);
        break;
       }
     }    	
   }
  }

}

?>