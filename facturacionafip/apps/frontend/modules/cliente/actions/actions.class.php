<?php

/**
 * cliente actions.
 *
 * @package    facturacionafip
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class clienteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cliente_list = ClientePeer::findAllActivos();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cliente = ClientePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->cliente);
    $this->contactos = $this->cliente->getContactos();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClienteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ClienteForm();

    $this->processForm($request, $this->form);
    $this->messageBox = new MessageBox("success", "Cliente creado con exito");
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClienteForm($cliente);
    $this->cliente = $cliente;
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClienteForm($cliente);
   
    $this->messageBox = new MessageBox("success", "Cliente actualizado con exito");
    $this->processForm($request, $this->form);
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));

    // Baja logica
    $cliente->setActivo(false);
    $cliente->save();

    // Eliminar los contactos
    foreach($cliente->getContactos() as $contacto){
      $contacto->delete();
    }

    $this->messageBox = new MessageBox("success", "Cliente eliminado con exito");
    $this->redirect('cliente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cliente = $form->save();

      $this->redirect('cliente/index');
    }
  }
}
