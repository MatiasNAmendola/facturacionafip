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
  }
}
