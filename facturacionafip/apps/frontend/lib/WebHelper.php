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
  # Si el tercer parametro es distinto de 0, se utiliza como mensaje para un
  # dialogo que debe aceptarse para seguir el vinculo
  public static function linkButton($label, $url, $confirmMessage=""){
  	 $condition = "true";
	 if($confirmMessage != ""){
 	  	 $condition = "confirm('".$confirmMessage."')";
         }
  	 print("<a onclick = \"javascript:return ".$condition."\" href=\"".$url."\">".$label."</a>");  	  
  }


} // MessageBox
?>
