<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Comprobante filter form base class.
 *
 * @package    facturacionafip
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseComprobanteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_comprobante_id'    => new sfWidgetFormPropelChoice(array('model' => 'TipoComprobante', 'add_empty' => true)),
      'nro_comprobante'        => new sfWidgetFormFilterInput(),
      'punto_venta_id'         => new sfWidgetFormPropelChoice(array('model' => 'PuntoVenta', 'add_empty' => true)),
      'fecha_comprobante'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'cliente_id'             => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => true)),
      'cbt_desde'              => new sfWidgetFormFilterInput(),
      'cbt_hasta'              => new sfWidgetFormFilterInput(),
      'imp_total'              => new sfWidgetFormFilterInput(),
      'imp_total_conceptos'    => new sfWidgetFormFilterInput(),
      'imp_neto'               => new sfWidgetFormFilterInput(),
      'imp_liquidado'          => new sfWidgetFormFilterInput(),
      'imp_liquidado_rni'      => new sfWidgetFormFilterInput(),
      'imp_operaciones_ex'     => new sfWidgetFormFilterInput(),
      'es_servicio'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_servicio_desde'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fecha_servicio_hasta'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fecha_vencimiento_pago' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'cae'                    => new sfWidgetFormFilterInput(),
      'fecha_cae'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_vto_cae'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'resultado'              => new sfWidgetFormFilterInput(),
      'motivo'                 => new sfWidgetFormFilterInput(),
      'reproceso'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tipo_comprobante_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoComprobante', 'column' => 'id')),
      'nro_comprobante'        => new sfValidatorPass(array('required' => false)),
      'punto_venta_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PuntoVenta', 'column' => 'id')),
      'fecha_comprobante'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cliente_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cliente', 'column' => 'id')),
      'cbt_desde'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cbt_hasta'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'imp_total'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'imp_total_conceptos'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'imp_neto'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'imp_liquidado'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'imp_liquidado_rni'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'imp_operaciones_ex'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'es_servicio'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_servicio_desde'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_servicio_hasta'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_vencimiento_pago' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cae'                    => new sfValidatorPass(array('required' => false)),
      'fecha_cae'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_vto_cae'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'resultado'              => new sfValidatorPass(array('required' => false)),
      'motivo'                 => new sfValidatorPass(array('required' => false)),
      'reproceso'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comprobante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comprobante';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'tipo_comprobante_id'    => 'ForeignKey',
      'nro_comprobante'        => 'Text',
      'punto_venta_id'         => 'ForeignKey',
      'fecha_comprobante'      => 'Date',
      'cliente_id'             => 'ForeignKey',
      'cbt_desde'              => 'Number',
      'cbt_hasta'              => 'Number',
      'imp_total'              => 'Number',
      'imp_total_conceptos'    => 'Number',
      'imp_neto'               => 'Number',
      'imp_liquidado'          => 'Number',
      'imp_liquidado_rni'      => 'Number',
      'imp_operaciones_ex'     => 'Number',
      'es_servicio'            => 'Boolean',
      'fecha_servicio_desde'   => 'Date',
      'fecha_servicio_hasta'   => 'Date',
      'fecha_vencimiento_pago' => 'Date',
      'cae'                    => 'Text',
      'fecha_cae'              => 'Date',
      'fecha_vto_cae'          => 'Date',
      'resultado'              => 'Text',
      'motivo'                 => 'Text',
      'reproceso'              => 'Text',
    );
  }
}
