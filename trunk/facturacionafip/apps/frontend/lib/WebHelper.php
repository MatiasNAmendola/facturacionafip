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

  # Inserta un link que cumple la funcion de un boton
  # Recibe un array asociativo con los parametros que 
  # definen el aspecto y comportamiento del boton
  public static function linkButton($params){
  	 $text = (isset($params['text']))?$params['text']:"";
  	 $target   = (isset($params['target']))?$params['target']:"";
	 $imgClass   = (isset($params['imgClass']))?$params['imgClass']:"";
	 $imgAlt   = (isset($params['imgAlt']))?$params['imgAlt']:"";
	 $linkClass = (isset($params['linkClass']))?$params['linkClass']:"";
	 $class = (isset($params['class']))?$params['class']:"";
	 $confirmMessage = (isset($params['confirmMessage']))?$params['confirmMessage']:"";
	 $clickAction = (isset($params['clickAction']))?$params['clickAction']:"";

  	 $condition = "true";
	 if($confirmMessage != ""){
 	  	 $condition = "confirm('".$confirmMessage."')";
         }

	 $onclick = "return ".$condition;
	 if($clickAction != ""){
	     $onclick="if(".$condition.") ".$clickAction.";  return false";
	 }

	 
  	 print("<a class=\"btn ".$linkClass."\" onclick = \"javascript:".$onclick."\" href=\"".$target."\">");
	 print($text);
	 if( isset($imgClass) && $imgClass != '' || isset($imgAlt) && $imgAlt != '' ){
	     print("<img class=\"".$imgClass."\" alt=\"".$imgAlt."\" />");
	 }
	 print("</a>");  	  

  }


} // MessageBox
?>
