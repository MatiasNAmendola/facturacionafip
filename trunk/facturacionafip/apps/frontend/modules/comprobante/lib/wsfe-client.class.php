<?php
#==============================================================================
//define ("WSDL", "wsfe.wsdl");     # The WSDL corresponding to WSFE
sfConfig::set("WSDL", "wsdls/wsfe.wsdl");
//define ("WSFEURL", "https://wswhomo.afip.gov.ar/wsfe/service.asmx");
sfConfig::set("WSFEURL", "https://wswhomo.afip.gov.ar/wsfe/service.asmx");
//define ("CUIT", 20135344991);     # CUIT del emisor de las facturas
sfConfig::set("CUIT", 20135344991);
#==============================================================================
class WsfeClient{
	public static function RecuperaQTY ($client, $token, $sign) {
	  $results=$client->FERecuperaQTYRequest(
	    array('argAuth'=>array('Token' => $token,
	                            'Sign' => $sign,
	                            'cuit' => sfConfig::get("CUIT"))));
	  if ( $results->FERecuperaQTYRequestResult->RError->percode != 0 )
	    {
	      printf ("Percode: %d\nPerrmsg: %s\n", 
	          $results->FERecuperaQTYRequestResult->RError->percode,
	          $results->FERecuperaQTYRequestResult->RError->perrmsg);
	      exit("Error");
	    }
	  return $results->FERecuperaQTYRequestResult->qty->value;
	}
	
	#==============================================================================
	public static function UltNro ($client, $token, $sign) {
	  $results=$client->FEUltNroRequest(
	    array('argAuth'=>array('Token' => $token,
	                            'Sign' => $sign,
	                            'cuit' => sfConfig::get("CUIT"))));
	  if ( $results->FEUltNroRequestResult->RError->percode != 0 )
	    {
	      printf ("Percode: %d\nPerrmsg: %s\n", 
	          $results->FEUltNroRequestResult->RError->percode,
	          $results->FEUltNroRequestResult->RError->perrmsg);
	      exit("Error");
	    }
	  return $results->FEUltNroRequestResult->nro->value;
	}
	
	#==============================================================================
	public static function RecuperaLastCMP ($client, $token, $sign, $ptovta, $tipocbte){
	  $results=$client->FERecuperaLastCMPRequest(
	    array('argAuth' =>  array('Token'    => $token,
	                              'Sign'     => $sign,
	                              'cuit'     => sfConfig::get("CUIT")),
	           'argTCMP' => array('PtoVta'   => $ptovta,
	                              'TipoCbte' => $tipocbte)));
	  if ( $results->FERecuperaLastCMPRequestResult->RError->percode != 0 )
	    {
	      printf ("Percode: %d\nPerrmsg: %s\n", 
	          $results->FERecuperaLastCMPRequestResult->RError->percode,
	          $results->FERecuperaLastCMPRequestResult->RError->perrmsg);
	      exit("Error");
	    }
	  return $results->FERecuperaLastCMPRequestResult->cbte_nro;
	}
	
	#==============================================================================
	public static function Aut ($client, $token, $sign, $ID, $cbte, Comprobante $comprobante) {
	  $results=$client->FEAutRequest(
	    array('argAuth' => array(
	             'Token' => $token,
	             'Sign'  => $sign,
	             'cuit'  => sfConfig::get("CUIT")),
	          'Fer' => array(
	             'Fecr' => array(
	                'id' => $ID, 
	                'cantidadreg' => 1, //TODO: hacer una llamada para esto recursivo. Solo se hace si es factura B y por montos menores a $1000 x c/u 
	                'presta_serv' => $comprobante->getEsServicio()),
	             'Fedr' => array(
	                'FEDetalleRequest' => array(
	                   'tipo_doc' => $comprobante->getCliente()->getTipoDocumento()->getCode(),
	                   'nro_doc' => $comprobante->getCliente()->getNroDocumento(),
	                   'tipo_cbte' => $comprobante->getTipoComprobante()->getCode(),
	                   'punto_vta' => $comprobante->getPuntoVenta()->getCode(),
	                   'cbt_desde' => $cbte,//TODO: hacer una llamada para esto recursivo. Solo se hace si es factura B y por montos menores a $1000 x c/u
	                   'cbt_hasta' => $cbte,//Si es B, es el número de factura desde y el número de factura hasta. Solo se permite para B
	                   'imp_total' => $comprobante->getImpTotal(),
	                   'imp_tot_conc' => $comprobante->getImpTotalConceptos(),
	                   'imp_neto' => $comprobante->getImpNeto(),
	                   'impto_liq' => $comprobante->getImpLiquidado(),
	                   'impto_liq_rni' => $comprobante->getImpLiquidadoRni(),
	                   'imp_op_ex' => $comprobante->getImpOperacionesEx(),
	                   'fecha_cbte' => $comprobante->getFechaComprobante('Ymd'),
	    			   'fecha_serv_desde' => $comprobante->getFechaServicioDesde('Ymd'),
	    			   'fecha_serv_hasta' => $comprobante->getFechaServicioHasta('Ymd'),
	                   'fecha_venc_pago' => $comprobante->getFechaVencimientoPago('Ymd'))))));
	  if ( $results->FEAutRequestResult->RError->percode != 0 )
	    {
	      printf ("Percode: %d\nPerrmsg: %s\n", 
	          $results->FEAutRequestResult->RError->percode,
	          $results->FEAutRequestResult->RError->perrmsg);
	      exit("Error");
	    }
	    
	  $comprobante->setNroComprobante($results->FEAutRequestResult->FecResp->id);
	  $comprobante->setFechaCae($results->FEAutRequestResult->FecResp->fecha_cae);
	  $comprobante->setReproceso($results->FEAutRequestResult->FecResp->reproceso);
	  $comprobante->setMotivo("-Fec: ".$results->FEAutRequestResult->FecResp->motivo);
	  
	  $comprobante->setCae($results->FEAutRequestResult->FedResp->FEDetalleResponse->cae);
	  $comprobante->setResultado($results->FEAutRequestResult->FedResp->FEDetalleResponse->resultado);
	  $comprobante->setMotivo($comprobante->getMotivo()." -Fed: ".$results->FEAutRequestResult->FedResp->FEDetalleResponse->motivo);
	  $comprobante->setFechaVtoCae($results->FEAutRequestResult->FedResp->FEDetalleResponse->fecha_vto);
	  return $comprobante;
	}
	
	#==============================================================================
	public static function dummy ($client) {
	  $results=$client->FEDummy();
	  printf("appserver status: %s\ndbserver status: %s\nauthserver status: %s\n",
	         $results->FEDummyResult->appserver, 
	         $results->FEDummyResult->dbserver, 
	         $results->FEDummyResult->authserver);
	  if (is_soap_fault($results)) 
	   { printf("Fault: %s\nFaultString: %s\n",
	             $results->faultcode, $results->faultstring); 
	     exit (1);
	   }
	  return;
	}
	#==============================================================================
	public static function generateSoapClient(){
	  $client=new SoapClient(sfConfig::get("WSDL"), 
  		array('soap_version' => SOAP_1_2,
        'location'     => sfConfig::get("WSFEURL"),
#       'proxy_host'   => "proxy",
#       'proxy_port'   => 80,
        'exceptions'   => 0,
        'trace'        => 1)); # needed by getLastRequestHeaders and others

  	  return $client;
	}
	#==============================================================================
	public static function getCuitEmisor(){
		return sfConfig::get("CUIT");
	}
}
?>