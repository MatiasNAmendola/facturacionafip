<?php
# Author: Gerardo Fisanotti - DvSHyS/DiOPIN/AFIP - 08-jun-07
# Function: Show a basic-functions WSFE SOAP client 
# Input:
#        WSDL, TA 
#        Check below for its definitions
#
#==============================================================================
define ("WSDL", "wsfe.wsdl");     # The WSDL corresponding to WSFE
define ("TA", "TA.xml");          # The TA as obtained from WSAA
define ("WSFEURL", "https://wswhomo.afip.gov.ar/wsfe/service.asmx");
define ("CUIT", 20135344991);     # CUIT del emisor de las facturas
#==============================================================================
function RecuperaQTY ($client, $token, $sign, $cuit)
{
  $results=$client->FERecuperaQTYRequest(
    array('argAuth'=>array('Token' => $token,
                            'Sign' => $sign,
                            'cuit' => $cuit)));
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
function UltNro ($client, $token, $sign, $cuit)
{
  $results=$client->FEUltNroRequest(
    array('argAuth'=>array('Token' => $token,
                            'Sign' => $sign,
                            'cuit' => $cuit)));
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
function RecuperaLastCMP ($client, $token, $sign, $cuit, $ptovta, $tipocbte)
{
  $results=$client->FERecuperaLastCMPRequest(
    array('argAuth' =>  array('Token'    => $token,
                              'Sign'     => $sign,
                              'cuit'     => $cuit),
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
function Aut ($client, $token, $sign, $cuit, $ID, $cbte)
{
  $results=$client->FEAutRequest(
    array('argAuth' => array(
             'Token' => $token,
             'Sign'  => $sign,
             'cuit'  => $cuit),
          'Fer' => array(
             'Fecr' => array(
                'id' => $ID, 
                'cantidadreg' => 1, 
                'presta_serv' => 0),
             'Fedr' => array(
                'FEDetalleRequest' => array(
                   'tipo_doc' => 80,
                   'nro_doc' => 23111111113,
                   'tipo_cbte' => 1,
                   'punto_vta' => 1,
                   'cbt_desde' => $cbte,
                   'cbt_hasta' => $cbte,
                   'imp_total' => 121.0,
                   'imp_tot_conc' => 0,
                   'imp_neto' => 100.0,
                   'impto_liq' => 21.0,
                   'impto_liq_rni' => 0.0,
                   'imp_op_ex' => 0.0,
                   'fecha_cbte' => date('Ymd'),
                   'fecha_venc_pago' => date('Ymd'))))));
  if ( $results->FEAutRequestResult->RError->percode != 0 )
    {
      printf ("Percode: %d\nPerrmsg: %s\n", 
          $results->FEAutRequestResult->RError->percode,
          $results->FEAutRequestResult->RError->perrmsg);
      exit("Error");
    }
# printf ("HEADERs:\n%s\n", $client->__getLastRequestHeaders());
# printf ("REQUEST:\n%s\n", $client->__getLastRequest());
#  file_put_contents("FE.xml",$client->__getLastResponse());
  return $results->FEAutRequestResult->FedResp->FEDetalleResponse->cae;
}
#==============================================================================
function dummy ($client)
{
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
if (!file_exists(WSDL)) {exit("Failed to open ".WSDL."\n");}
if (!file_exists(TA)) {exit("Failed to open ".TA."\n");}
$client=new SoapClient(WSDL, 
  array('soap_version' => SOAP_1_2,
        'location'     => WSFEURL,
#       'proxy_host'   => "proxy",
#       'proxy_port'   => 80,
        'exceptions'   => 0,
        'trace'        => 1)); # needed by getLastRequestHeaders and others
$TA=simplexml_load_file(TA);
$token=$TA->credentials->token;
$sign=$TA->credentials->sign;
dummy($client);
$QTY=RecuperaQTY($client, $token, $sign, CUIT);
printf ("QTY: %s\n", $QTY);
$LastID=UltNro($client, $token, $sign, CUIT);
printf ("LastID: %s\n", $LastID);
$LastCBTE=RecuperaLastCMP($client, $token, $sign, CUIT, 1, 1);
printf ("LastCBTE: %s\n", $LastCBTE);
$CAE=Aut($client, $token, $sign, CUIT, $LastID + 1, $LastCBTE + 1);
printf ("CAE: %s\n", $CAE);
?>
