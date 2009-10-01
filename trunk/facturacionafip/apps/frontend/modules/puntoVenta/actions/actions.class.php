<?php

/**
 * puntoVenta actions.
 *
 * @package    facturacionafip
 * @subpackage puntoVenta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class puntoVentaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($request->hasParameter('created')){
    	$this->messageBox = new MessageBox('success', 'su punto de venta fue creado exitosamente');
    }
    if ($request->hasParameter('deleted')){
    	$this->messageBox = new MessageBox('success', 'su punto de venta fue dado de baja');
    }
    $this->punto_venta_list = PuntoVentaPeer::findAllActivos();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->punto_venta = PuntoVentaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->punto_venta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PuntoVentaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new PuntoVentaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($punto_venta = PuntoVentaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object punto_venta does not exist (%s).', $request->getParameter('id')));
    $this->form = new PuntoVentaForm($punto_venta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($punto_venta = PuntoVentaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object punto_venta does not exist (%s).', $request->getParameter('id')));
    $this->form = new PuntoVentaForm($punto_venta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    
//    $request->checkCSRFProtection();
    
    $this->forward404Unless($punto_venta = PuntoVentaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object punto_venta does not exist (%s).', $request->getParameter('id')));
    $punto_venta->setActive(false);
    $punto_venta->setOldCode($punto_venta->getCode());
    $punto_venta->setCode(null);
    $punto_venta->save();

    $this->redirect('puntoVenta/index?deleted=1');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $punto_venta = $form->save();

      $this->redirect('puntoVenta/index?created=1');
    }
  }
}