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

    $formatter = $this->getWidgetSchema()->getFormFormatter();
    $rowFormat = "<tr><th>%label%</th><td>%field%%help%</td><td>%error%</td><td>%hidden_fields%</td></tr>";
    $formatter->setRowFormat($rowFormat);

    $validatorSchema = $this->getValidatorSchema();
    foreach($this->getFormFieldSchema() as $field){
        $name = $field->getName();
	$validator = $this->getValidator($name);
	$validator->setMessage("required", "El campo es requerido");        
	$validator->setMessage("invalid", "El valor ingresado no es v&aacute;lido");        
    } // for all fields

  }
}
