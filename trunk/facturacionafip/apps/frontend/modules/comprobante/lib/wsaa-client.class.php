<?php
	# Author: Gerardo Fisanotti - DvSHyS/DiOPIN/AFIP - 13-apr-07
# Function: Get an authorization ticket (TA) from AFIP WSAA
# Input:
#        WSDL, CERT, PRIVATEKEY, PASSPHRASE, SERVICE, WSAAURL
#        Check below for its definitions
# Output:
#        TA.xml: the authorization ticket as granted by WSAA.
#==============================================================================
//define ("WSDL", "wsaa.wsdl");     # The WSDL corresponding to WSAA
	sfConfig::set('WSDL', "wsaa.wsdl");
//define ("CERT", "CUIT_20135344991.crt");       # The X.509 obtained from Seg. Inf.
	sfConfig::set('CERT', "CUIT_20135344991.crt");
//define ("PRIVATEKEY", "privada"); # The private key correspoding to CERT
	sfConfig::set('PRIVATEKEY' ,"privada");
//define ("PASSPHRASE", "xxxxxxx"); # The passphrase (if any) to sign
	sfConfig::set('PASSPHRASE', "xxxxxxx");
//# SERVICE: The WS service name you are asking a TA for
//define ("SERVICE", "wsfe");
	sfConfig::set('SERVICE', "wsfe");
//# WSAAURL: the URL to access WSAA, check for http or https and wsaa or wsaahomo
//#define ("WSAAURL", "https://wsaa.afip.gov.ar/ws/services/LoginCms");
//define ("WSAAURL", "https://wsaahomo.afip.gov.ar/ws/services/LoginCms");
	sfConfig::set('WSAAURL', "https://wsaahomo.afip.gov.ar/ws/services/LoginCms");
//#------------------------------------------------------------------------------
//# The following constants are related to remote web server verification
//# If REMVERIFY is FALSE, then the other three constants don't matter.
//define ("REMVERIFY",FALSE); # If FALSE, no remote Web Server verification done
	sfConfig::set('REMVERIFY', FALSE);
//define ("REMSELFSIGN",FALSE); # Do we accept self-signed certificates?
	sfConfig::set('REMSELFSIGN', FALSE);
//# Remote Web Server certificate's CN (CommonName)
//define ("REMCN","wsaahomo.afip.gov.ar"); # WSAA homologacion
	sfConfig::set('REMCN', "wsaahomo.afip.gov.ar");
//# Remote Web Server CA Cert
//define ("REMCACERT","AFIPcerthomo.crt"); # WSAA homologacion
	sfConfig::set('REMCACERT', "AFIPcerthomo.crt"); # WSAA homologacion
#------------------------------------------------------------------------------
# You shouldn't have to change anything below this line!!!
#==============================================================================

	class WsaaClient {

	public static function CreateTRA() {
	  $TRA = new SimpleXMLElement(
	    '<?xml version="1.0" encoding="UTF-8"?>' .
	    '<loginTicketRequest version="1.0">'.
	    '</loginTicketRequest>');
	  $TRA->addChild('header');
	  $TRA->header->addChild('uniqueId',date('U'));
	  $TRA->header->addChild('generationTime',date('c',date('U')-600));
	  $TRA->header->addChild('expirationTime',date('c',date('U')+600));
	  $TRA->addChild('service',sfConfig::get('SERVICE'));
	  $TRA->asXML('TRA.xml');
	}
	
	#==============================================================================
	# This functions makes the PKCS#7 signature using TRA as input file, CERT and
	# PRIVATEKEY to sign. Generates an intermediate file and finally trims the 
	# MIME heading leaving the final CMS required by WSAA.
	public static function SignTRA() {
	  $STATUS=openssl_pkcs7_sign("TRA.xml", "TRA.tmp", "file://".sfConfig::get('CERT'),
	    array("file://".sfConfig::get('PRIVATEKEY'), sfConfig::get('PASSPHRASE')),
	    array(),
	    !PKCS7_DETACHED
	    );
	  if (!$STATUS) {
	  	throw new WsaaException(0, "Error al intentar firmar el TRA");
	  }
	  $inf=fopen("TRA.tmp", "r");
	  $i=0;
	  $CMS="";
	  while (!feof($inf)) 
	    { 
	      $buffer=fgets($inf);
	      if ( $i++ >= 4 ) {$CMS.=$buffer;}
	    }
	  fclose($inf);
	  unlink("TRA.xml");
	  unlink("TRA.tmp");
	  return $CMS;
	}
	
	#==============================================================================
	public static function CallWSAA($CMS) {
	  # Now we create a context to specify remote web server certificate checking
	  # If you don want to check remote server, you may set verify_peer to FALSE.
	  $ctx = stream_context_create( array('ssl'=>array(
	    #'capath'            => "/xxx/yyy/",
	    #'localcert'         => "crtPlusKey.pem",
	    #'passphrase'        => "xxxx",
	     'CN_match'          => sfConfig::get('REMCN'),
	     'cafile'            => sfConfig::get('REMCACERT'),
	     'allow_self_signed' => sfConfig::get('REMSELFSIGN'),
	     'verify_peer'       => sfConfig::get('REMVERIFY')
	     )));
	  $client=new SoapClient("wsdls/".sfConfig::get('WSDL'), array(
	          #'proxy_host'     => "proxy",
	          #'proxy_port'     => 80,
	          'stream_context' => $ctx,
	          'soap_version'   => SOAP_1_2,
	          'location'       => sfConfig::get('WSAAURL'),
	          'exceptions'     => 0
	          )); 
	  $results=$client->loginCms(array('in0'=>$CMS));
	  if (is_soap_fault($results)) {
	  	throw new WsaaException(0, $results->faultcode.$results->faultstring);
	  }
	  return $results->loginCmsReturn;
	}
}
?>