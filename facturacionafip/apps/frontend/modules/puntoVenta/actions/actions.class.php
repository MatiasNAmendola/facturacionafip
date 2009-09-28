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

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $punto_venta = $form->save();

      $this->redirect('puntoVenta/index');
    }
  }
}