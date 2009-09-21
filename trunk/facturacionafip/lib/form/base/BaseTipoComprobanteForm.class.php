<?php

/**
 * TipoComprobante form base class.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTipoComprobanteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'code'        => new sfWidgetFormInput(),
      'description' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'TipoComprobante', 'column' => 'id', 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 2)),
      'description' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('tipo_comprobante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoComprobante';
  }


}
