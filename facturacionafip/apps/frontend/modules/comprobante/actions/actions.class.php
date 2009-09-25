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

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
//      $comprobante = $form->save();
/**
 * El updateObject() me llena mi objeto $comprobante con los datos que 
 * vienen en el formulario. Luego de llamar al service, puedo enviar a
 * grabar 
 */
    	/**
    	 * TESTS TESTS
    	 * @var unknown_type
    	 */
    	
    ini_set("soap.wsdl_cache_enabled", "0");

    WsaaClient::CreateTRA();
	$CMS = WsaaClient::SignTRA();
	$TA = WsaaClient::CallWSAA($CMS);
	
	if (!file_put_contents("TA.xml", $TA)) {
		exit("Error writing TA.xml\n");
	}else{
		echo "listo el pollo, pelada la gallina";
	}
    	
      $comprobante = $form->updateObject();
      $this->redirect('comprobante/edit?id='.$comprobante->getId());
    }
  }
}