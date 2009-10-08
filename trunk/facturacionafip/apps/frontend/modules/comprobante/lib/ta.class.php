<?php
sfConfig::set("TA", "TA.xml");
class TA{
  private $TAfile;
  
  public function __construct(){
  	if (!file_exists(sfConfig::get("TA"))) {
  		$this->generateTA();
  	}
  	$this->TAfile = simplexml_load_file(sfConfig::get("TA"));
  }
	
  public function getToken(){
  	return $this->getTA()->credentials->token;
  }
  
  public function getSign(){
  	return $this->getTA()->credentials->sign;
  }
  
  private function getTA(){
  	return $this->TAfile;
  }
  
  public function actualizate(){
  	$this->generateTA();
  }
  
  /**
   * Manejar el error como la gente
   * @return unknown_type
   */
  private function generateTA(){
    ini_set("soap.wsdl_cache_enabled", "0");

    try {
	    WsaaClient::CreateTRA();
		$CMS = WsaaClient::SignTRA();
		$TA = WsaaClient::CallWSAA($CMS);
    }catch (ConectionException $ce){
			/**
		 * TODO: GENERAR EXCEPCIÓN
		 */
		echo "ERROR ERROR ERROR ta.class.php.generateTA";
		echo "<br> NO HAY CONEXIÓN";
		die();	
	}
	
	if (!file_put_contents(sfConfig::get("TA"), $TA)) {
		/**
		 * TODO: GENERAR EXCEPCIÓN
		 */
		echo "ERROR ERROR ERROR ta.class.php.generateTA";
		die();
	}
  }
}
?>