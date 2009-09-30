<?php

/**
 * comprobante actions.
 *
 * @package    facturacionafip
 * @subpackage comprobante
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class comprobanteActions extends sfActions {
	
  public function executeIndex(sfWebRequest $request) {
  	if ($request->hasParameter('code')){
    	$this->messageBox = new MessageBox('error', WsErrorPeer::getByCode($request->getParameter('code')));
    }
    $this->comprobante_list = ComprobantePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request) {
    $this->comprobante = ComprobantePeer::retrieveByPk($request->getParameter('id'));
    if ($request->hasParameter('creado')){
    	$this->messageBox = new MessageBox('success', "Su comprobante ya está avalado por la AFIP");
    }
    $this->forward404Unless($this->comprobante);
  }

  public function executeNew(sfWebRequest $request) {
    $this->form = new ComprobanteForm();
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod('post'));    
    $this->form = new ComprobanteForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form){
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $this->messageBox = new MessageBox('error', "Complete los datos requeridos");
    if ($form->isValid()){
		$comprobante = $form->updateObject();
		try{
			$comprobante->generate();
			$comprobante->save();
		    $this->redirect('comprobante/show?id='.$comprobante->getId().'&creado=1');
		}catch (WsaaException $wsaaE){
			$this->redirect('comprobante/index?code='.$wsaaE->getCode());
		}catch (WsfeException $wsfeE){
			$this->messageBox = new MessageBox('error', $wsfeE->getMessage());
		}catch (BusinessException $be){
			$this->messageBox = new MessageBox('error', $be->getMessage());
		}
    }
  }
}