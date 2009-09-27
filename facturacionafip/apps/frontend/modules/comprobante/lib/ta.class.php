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
  
  /**
   * Manejar el error como la gente
   * @return unknown_type
   */
  private function generateTA(){
    ini_set("soap.wsdl_cache_enabled", "0");

    WsaaClient::CreateTRA();
	$CMS = WsaaClient::SignTRA();
	$TA = WsaaClient::CallWSAA($CMS);
	
	if (!file_put_contents(sfConfig::get("TA"), $TA)) {
		echo "ERROR ERROR ERROR ta.class.php.generateTA";
		die();
	}
  }
}
?>