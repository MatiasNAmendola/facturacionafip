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
	      $this['created_at'], 
	      $this['updated_at'],
	      $this['fecha_cae'],
	      $this['resultado'],
	      $this['motivo'],
	      $this['reproceso'],
	      $this['cae'],
	      $this['fecha_vto_cae']
	    );
  }
	
}
