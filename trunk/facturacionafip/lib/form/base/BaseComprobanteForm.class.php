<?php

/**
 * Comprobante form base class.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseComprobanteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'tipo_comprobante_id'    => new sfWidgetFormPropelChoice(array('model' => 'TipoComprobante', 'add_empty' => true)),
      'nro_comprobante'        => new sfWidgetFormInput(),
      'punto_venta_id'         => new sfWidgetFormPropelChoice(array('model' => 'PuntoVenta', 'add_empty' => true)),
      'fecha_comprobante'      => new sfWidgetFormDateTime(),
      'cliente_id'             => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => true)),
      'cbt_desde'              => new sfWidgetFormInput(),
      'cbt_hasta'              => new sfWidgetFormInput(),
      'imp_total'              => new sfWidgetFormInput(),
      'imp_total_conceptos'    => new sfWidgetFormInput(),
      'imp_neto'               => new sfWidgetFormInput(),
      'imp_liquidado'          => new sfWidgetFormInput(),
      'imp_liquidado_rni'      => new sfWidgetFormInput(),
      'imp_operaciones_ex'     => new sfWidgetFormInput(),
      'es_servicio'            => new sfWidgetFormInputCheckbox(),
      'fecha_servicio_desde'   => new sfWidgetFormDateTime(),
      'fecha_servicio_hasta'   => new sfWidgetFormDateTime(),
      'fecha_vencimiento_pago' => new sfWidgetFormDateTime(),
      'cae'                    => new sfWidgetFormInput(),
      'fecha_cae'              => new sfWidgetFormDateTime(),
      'fecha_vto_cae'          => new sfWidgetFormDateTime(),
      'resultado'              => new sfWidgetFormInput(),
      'motivo'                 => new sfWidgetFormInput(),
      'reproceso'              => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Comprobante', 'column' => 'id', 'required' => false)),
      'tipo_comprobante_id'    => new sfValidatorPropelChoice(array('model' => 'TipoComprobante', 'column' => 'id', 'required' => false)),
      'nro_comprobante'        => new sfValidatorString(array('max_length' => 255)),
      'punto_venta_id'         => new sfValidatorPropelChoice(array('model' => 'PuntoVenta', 'column' => 'id', 'required' => false)),
      'fecha_comprobante'      => new sfValidatorDateTime(),
      'cliente_id'             => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id', 'required' => false)),
      'cbt_desde'              => new sfValidatorInteger(),
      'cbt_hasta'              => new sfValidatorInteger(),
      'imp_total'              => new sfValidatorNumber(),
      'imp_total_conceptos'    => new sfValidatorNumber(),
      'imp_neto'               => new sfValidatorNumber(),
      'imp_liquidado'          => new sfValidatorNumber(),
      'imp_liquidado_rni'      => new sfValidatorNumber(),
      'imp_operaciones_ex'     => new sfValidatorNumber(),
      'es_servicio'            => new sfValidatorBoolean(),
      'fecha_servicio_desde'   => new sfValidatorDateTime(array('required' => false)),
      'fecha_servicio_hasta'   => new sfValidatorDateTime(array('required' => false)),
      'fecha_vencimiento_pago' => new sfValidatorDateTime(array('required' => false)),
      'cae'                    => new sfValidatorString(array('max_length' => 255)),
      'fecha_cae'              => new sfValidatorDateTime(),
      'fecha_vto_cae'          => new sfValidatorDateTime(),
      'resultado'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'motivo'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reproceso'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comprobante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comprobante';
  }


}
