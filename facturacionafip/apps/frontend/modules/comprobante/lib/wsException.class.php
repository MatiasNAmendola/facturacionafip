<?php
interface IException
{
    /* Protected methods inherited from Exception class */
    public function getMessage();                 // Exception message
    public function getCode();                    // User-defined Exception code
   
    /* Overrideable methods inherited from Exception class */
    public function __toString();                 // formated string for display
    public function __construct($code = 0, $message = null);
}

abstract class WsException extends Exception implements IException{
	protected $message;
	protected $code;
	
	public function __construct($code = 0, $message = null){
		$this->message = $message;
		$this->code = $code;
	}
	
	public function __toString(){
		return "codigo: ".$this->code." mensaje: ".$this->message;
	}
}
?>