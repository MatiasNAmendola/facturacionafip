<?php

/**
 * Cliente form.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['activo']);
    $this->widgetSchema->setLabel('tipo_documento_id', 'Tipo de Documento');
    $this->widgetSchema->setLabel('direccion', 'Direcci&oacute;n');

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

  } // configure

} // ClienteForm
