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
    $this->itemForm = new ComprobanteItemForm();
    $this->comprobante = new Comprobante();
  }
  
  public function executeAddItem(sfWebRequest $request){
  	$this->forward404Unless($request->isMethod('post'));
  	$this->itemForm = new ComprobanteItemForm();
    $form = $this->processItemForm($request, $this->itemForm);
    return $this->renderPartial("itemForm", array('comprobante' => $this->getUser()->getFlash('comprobante'), 'itemForm' => $form));
  }

  public function executeCreate(sfWebRequest $request) {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new ComprobanteForm();
    $this->processForm($request, $this->form);
    $this->itemForm = new ComprobanteItemForm();
    $this->comprobante = $this->getUser()->getFlash('comprobante');
    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form){
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $comprobanteFlash = $this->getUser()->getFlash('comprobante');
    if ($form->isValid()){
		$comprobante = $form->updateObject();
		$comprobante->copiarImportes($comprobanteFlash);
		try{
			$comprobante->generate();
			$comprobante->save();
			$this->messageBox = new MessageBox('success', "Su comprobante ya está avalado por la AFIP", $this->getUser());
		    $this->redirect('comprobante/show?id='.$comprobante->getId());
		}catch (WsaaException $wsaaE){
			$this->messageBox = new MessageBox('error', $wsaaE->getMessage(), $this->getUser());
			$this->redirect('comprobante/index');
		}catch (WsfeException $wsfeE){
		  $this->getUser()->setFlash('comprobante', $comprobanteFlash);
		  $this->messageBox = new MessageBox('error', $wsfeE->getMessage(), $this->getUser());
		}catch (BusinessException $be){
		  $this->getUser()->setFlash('comprobante', $comprobanteFlash);
		  $this->messageBox = new MessageBox('error', $be->getMessage(), $this->getUser());
		}
    }else{
    	$this->getUser()->setFlash('comprobante', $comprobanteFlash);
    	$this->messageBox = new MessageBox('error', "Complete los datos requeridos", $this->getUser());
    }
  }
  
  protected function processItemForm(sfWebRequest $request, sfForm $itemForm){
	if (!$this->getUser()->hasFlash('comprobante')){
		$this->getUser()->setFlash('comprobante', new Comprobante());
	}
	$comprobante = $this->getUser()->getFlash('comprobante');
  	$itemForm->bind($request->getParameter($itemForm->getName()));
    if ($itemForm->isValid()){
		$comprobanteItem = $itemForm->updateObject();
		$itemForm = new ComprobanteItemForm();
		$comprobante->addComprobanteItem($comprobanteItem);
		$comprobante->calculateTotales();
  	}
	$this->getUser()->setFlash('comprobante', $comprobante);
	return $itemForm;
  }
  
}