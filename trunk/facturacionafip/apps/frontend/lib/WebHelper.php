<?php

# Clase utilitaria de la capa de presentación
class WebHelper
{
#  public  function __construct($type, $message){
#  } // construct

  # Inserta una separación en la página de la altura indicada
  public static function vseparator($h){
  	  # No implementado
  }

  # Inserta un link con label y url indicados
  public static function linkButton($label, $url){
  	  print("<a href=\"".$url."\">".$label."</a>");  	  
  }


} // MessageBox
?>
