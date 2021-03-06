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

    $this->processForm($request, $this->form, 'creado');

    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClienteForm($cliente);
    $volver_a = $request->getParameter('volver_a');
    $this->volver_a_cliente = isset($volver_a) && ($volver_a  == 'cliente');
    $this->cliente = $cliente;

  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClienteForm($cliente);
    $this->processForm($request, $this->form, 'actualizado');
    $this->setTemplate('edit');

    $volver_a = $request->getParameter('volver_a_cliente');
    $this->volver_a_cliente = isset($volver_a) && ($volver_a  == 'true');
  }

  public function executeDelete(sfWebRequest $request)
  {
//    $request->checkCSRFProtection();

    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    // Baja logica
    $cliente->setActivo(false);
    $cliente->save();

    // Eliminar los contactos
    foreach($cliente->getContactos() as $contacto){
      $contacto->delete();
    }
    $this->messageBox = new MessageBox("success" , "Su cliente fue borrado correctamente", $this->getUser());
    $this->redirect('cliente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form, $accion)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cliente = $form->save();
      $this->messageBox = new MessageBox("success", "El cliente ha sido $accion correctamente", $this->getUser());	
      
      $volver_a_cliente = $request->getParameter('volver_a_cliente');
      if(isset($volver_a_cliente) && $volver_a_cliente == 'true'){
        $destination = 'cliente/show?id='.$cliente->getId();
      }else{
	$destination = 'cliente/index';
      }

      $this->redirect($destination);
    }else{
      $this->messageBox = new MessageBox("error", "Verifique los datos ingresados", $this->getUser());
    }
  } // processForm


}
