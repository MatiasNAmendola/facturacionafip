<?php

class MessageBox
{

  private $type;
  private $message;
  private $classesByType = array(
			     'error' => 'messageBoxError',
			     'success' => 'messageBoxSuccess'
			     );



  public  function __construct($type, $message){
    $this->type    = $type;
    $this->message = $message;
  } // construct

  public function __toString(){
    return $this->render();
  } // toString

  public function getType(){
    return $this->type;
  }

  public function getClass(){
    $class = $this->classesByType[$this->type];
    if(!$class){
      $class = "messageBox";
    }
    return $class;
  }

  public function getMessage(){
    return $this->message;
  }



  // Devuelve el codigo html para incluir en el template
  public  function render(){
    $class = $this->classesByType[$this->type];
    if(!$class){
      $class = "messageBox";
    }

    $html = "";
    $html    .= "<div class='".$class."'>";
    $html    .=     "<p>";
    $html    .=         $this->message;
    $html    .=     "</p>";
    $html    .= "</div>";
    
    return $html;
  } // render
} // MessageBox
?>