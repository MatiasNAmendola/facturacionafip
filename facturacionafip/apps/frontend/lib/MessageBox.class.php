<?php

class MessageBox
{
  // SERIALIZACION Y ALMACENAMIENTO EN LA SESION
  private static $_separator = "XXxXX";
  private static $_sessionKey = "MessageBox";
  
  private $defined = false;
  private $type;
  private $message;
  private $classesByType = array(
			     'error' => 'messageBoxError',
			     'success' => 'messageBoxSuccess'
			     );

  private function serialize(){
    $result = "";

    $result .= $this->type;
    $result .= MessageBox::$_separator;
    $result .= $this->message;

    return $result;
  }# serialize
     
  private function deserialize($serialization){
    $split = split(MessageBox::$_separator, $serialization);
    
    $k = 0;
    
    if( $k < count($split)){
      $this->type = $split[$k++];
    }
    if( $k < count($split)){
      $this->message = $split[$k++];
    }
  }# serialize
     
  public function popFromSession($sfUser){
    $this->defined = false;    

    if($sfUser->hasAttribute(MessageBox::$_sessionKey)){
      $data = $sfUser->getAttribute(MessageBox::$_sessionKey);
      $sfUser->getAttributeHolder()->remove(MessageBox::$_sessionKey);


      if($data != ""){
	$this->defined = true;
	$this->deserialize($data);
      } // if data != ""

    } // if sfUser->hasAttribute
  } // popFromSession
     
  public function isDefined(){
    return $this->defined;
  } // isDefined
     
  public function pushToSession($sfUser){
    $data = "";
    $data = $this->serialize();
    
    $sfUser->setAttribute(MessageBox::$_sessionKey, $data);
  } // pushToSession

  /*
  public  function __construct($type, $message){
    $this->type    = $type;
    $this->message = $message;
  } // construct
  */

  public  function __construct($type="", $message="", $sfUser=null){
   
    $this->type    = $type;
    $this->message = $message;
   
    if($sfUser != null){
      MessageBox::pushToSession($sfUser);
    }
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