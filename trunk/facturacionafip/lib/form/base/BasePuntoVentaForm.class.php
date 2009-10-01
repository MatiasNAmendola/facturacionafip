<?php

/**
 * PuntoVenta form base class.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePuntoVentaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'code'        => new sfWidgetFormInput(),
      'old_code'    => new sfWidgetFormInput(),
      'description' => new sfWidgetFormInput(),
      'active'      => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'PuntoVenta', 'column' => 'id', 'required' => false)),
      'code'        => new sfValidatorInteger(array('required' => false)),
      'old_code'    => new sfValidatorInteger(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255)),
      'active'      => new sfValidatorBoolean(),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'PuntoVenta', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('punto_venta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PuntoVenta';
  }


}
