<?php

/**
 * ComprobanteItem form.
 *
 * @package    facturacionafip
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ComprobanteItemForm extends BaseComprobanteItemForm
{
  public function configure() {
  	unset(
	      $this['id'],
	      $this['comprobante_id']
	 );
  }
}
