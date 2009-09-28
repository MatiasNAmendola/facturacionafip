<?php

/**
 * Contacto form.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ContactoForm extends BaseContactoForm
{
  public function configure()
  {
    unset(
	  $this['cliente_id']
	  );
    $this->widgetSchema['cliente_id'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['cliente_id'] = new sfValidatorNumber(array('required' => true));
  }
}
