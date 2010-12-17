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

    $this->processForm($request, $this->form, "creado");

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
    
    $this->setTemplate('edit');
    $this->processForm($request, $this->form, "actualizado");
  }

  public function executeDelete(sfWebRequest $request)
  {
    
//    $request->checkCSRFProtection();
    
    $this->forward404Unless($punto_venta = PuntoVentaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object punto_venta does not exist (%s).', $request->getParameter('id')));
    $punto_venta->setActive(false);
    $punto_venta->setOldCode($punto_venta->getCode());
    $punto_venta->setCode(null);
    $punto_venta->save();
    $this->messageBox = new MessageBox('success', 'El Punto de Venta ha sido dado de baja con éxito', $this->getUser());
    $this->redirect('puntoVenta/index');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form, $accion)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $punto_venta = $form->save();

      $this->messageBox = new MessageBox('success', 'El punto de venta ha sido '.$accion.' exitosamente', $this->getUser());
      $this->redirect('puntoVenta/index');
    }else{
      $this->messageBox = new MessageBox('error', 'Verifique los datos ingresados', $this->getUser());
    }
  }
}