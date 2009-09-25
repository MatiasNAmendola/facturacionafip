<?php
//define ("TA", "TA.xml");          # The TA as obtained from WSAA
sfConfig::set("TA", "TA.xml");
class TA{
  private $TA = null;
	
  public static function getToken(){
  	return $this->getTA()->credentials->token;
  }
  
  public static function getSign(){
  	return $this->getTA()->credentials->sing;
  }
  
  private function getTA(){
  	if ($this->TA == null){
  		if (!file_exists(sfConfig::get("TA"))) {
  			$this->generateTA();
  		}
  		$this->TA = simplexml_load_file(sfConfig::get("TA"));
  	}
  	return $this->TA;
  }
  
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