<?php

/**
 * Comprobante form.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ComprobanteForm extends BaseComprobanteForm
{
	public function configure(){
	    unset(
	      $this['id'],
	      $this['nro_comprobante'],
	      $this['cbt_desde'],
	      $this['cbt_hasta'],
	      $this['created_at'], 
	      $this['updated_at'],
	      $this['fecha_cae'],
	      $this['resultado'],
	      $this['motivo'],
	      $this['reproceso'],
	      $this['cae'],
	      $this['fecha_vto_cae'],
	      $this['imp_total'],
	      $this['imp_total_conceptos'],
	      $this['imp_neto'],
	      $this['imp_liquidado'],
	      $this['imp_liquidado_rni'],
	      $this['imp_operaciones_ex']
	    );
	    
	    $ptoVenta = new Criteria();
    	$ptoVenta->add(PuntoVentaPeer::ACTIVE, true);
    	$this->widgetSchema['punto_venta_id']->setOption('criteria', $ptoVenta);
    	
    	$clientes = new Criteria();
    	$clientes->add(ClientePeer::ACTIVO, true);
    	$this->widgetSchema['cliente_id']->setOption('criteria', $clientes);
  }	
}