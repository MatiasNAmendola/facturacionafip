<?php

/**
 * PuntoVenta form.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PuntoVentaForm extends BasePuntoVentaForm
{
  public function configure()
  {
  	unset(
	      $this['old_code'],
	      $this['created_at'], 
	      $this['updated_at']
	    );

	$this->widgetSchema['id'] = new sfWidgetFormInputHidden();    
	$this->widgetSchema['active'] = new sfWidgetFormInputHidden();    

	$formatter = $this->getWidgetSchema()->getFormFormatter();
	$rowFormat = "<tr><th>%label%</th><td>%field%%help%</td><td>%error%</td><td>%hidden_fields%</td></tr>";
	$formatter->setRowFormat($rowFormat);
	    
	$this->widgetSchema->setLabel('code', 'C&oacute;digo');
	$this->widgetSchema->setLabel('description', 'Descripci&oacute;n');

    $validatorSchema = $this->getValidatorSchema();
    foreach($this->getFormFieldSchema() as $field){
        $name = $field->getName();
	$validator = $this->getValidator($name);
	$validator->setMessage("required", "El campo es requerido");        
	$validator->setMessage("invalid", "El valor ingresado no es v&aacute;lido");        

    } // for all fields
    $post_validator = $validatorSchema->getPostValidator();
    $post_validator->setMessage("invalid", "Ya existe un punto de venta con el mismo código");	
//    $post_validator->setMessage("required", "Debe especificarse un código");	
  
    

  }
}