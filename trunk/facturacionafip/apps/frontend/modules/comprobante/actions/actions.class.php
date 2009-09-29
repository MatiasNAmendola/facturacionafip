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
    $this->comprobante_list = ComprobantePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request) {
    $this->comprobante = ComprobantePeer::retrieveByPk($request->getParameter('id'));
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
    if ($form->isValid()){
		$comprobante = $form->updateObject();
		try{
			$comprobante->generate();
			$comprobante->save();
		    $this->redirect('comprobante/show?id='.$comprobante->getId());
		}catch (WsaaException $wsaaE){
			$this->messageBox = new MessageBox('error', $wsaaE->getMessage());
			$this->redirect('comprobante/index');
		}catch (WsfeException $wsfeE){
			$this->messageBox = new MessageBox('error', $wsfeE->getMessage());
			$this->redirect('comprobante/index');
		}catch (BusinessException $be){
			$this->messageBox = new MessageBox('error', $be->getMessage());
		}
    }
  }
}