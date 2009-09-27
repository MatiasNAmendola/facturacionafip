<?php

/**
 * comprobante actions.
 *
 * @package    facturacionafip
 * @subpackage comprobante
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class comprobanteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->comprobante_list = ComprobantePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->comprobante = ComprobantePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->comprobante);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ComprobanteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    
    $this->form = new ComprobanteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($comprobante = ComprobantePeer::retrieveByPk($request->getParameter('id')), sprintf('Object comprobante does not exist (%s).', $request->getParameter('id')));
    $this->form = new ComprobanteForm($comprobante);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($comprobante = ComprobantePeer::retrieveByPk($request->getParameter('id')), sprintf('Object comprobante does not exist (%s).', $request->getParameter('id')));
    $this->form = new ComprobanteForm($comprobante);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($comprobante = ComprobantePeer::retrieveByPk($request->getParameter('id')), sprintf('Object comprobante does not exist (%s).', $request->getParameter('id')));
    $comprobante->delete();

    $this->redirect('comprobante/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form){
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()){
		$comprobante = $this->generarComprobante($form);
		$comprobante->save();
	    $this->redirect('comprobante/edit?id='.$comprobante->getId());
    }
  }
  
  private function generarComprobante(ComprobanteForm $form){
  	$comprobante = $form->updateObject();
  	$client = WsfeClient::generateSoapClient();
  	$sing = TA::getSign();
  	$token = TA::getToken();
  	/**
  	 * TODO: Validar que el TA sea vigente. Esto se logra modificando los métodos del WSFE para
  	 * que lance los errores como excepciones y sean tratados aquí. 
  	 * Lo anterior sería lógica de negocio, sacar la lógica de negocio de este Action y ponerla en Comprobante->generate();
  	 * @var unknown_type
  	 */
  	$ultimoNro = WsfeClient::UltNro($client, $token, $sing, WsfeClient::getCuitEmisor());
  	/**
  	 * TODO: Realizar las validaciones pertinentes de las posibles salidas
  	 * @var unknown_type
  	 */
  	$comprobante = WsfeClient::Aut($client, $token, $sign, $client, $ultimoNro + 1, $ultimoNro, $comprobante);
  }
}