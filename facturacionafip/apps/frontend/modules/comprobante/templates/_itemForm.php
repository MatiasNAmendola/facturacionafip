<?php include_stylesheets_for_form($itemForm) ?>
<?php include_javascripts_for_form($itemForm) ?>
<?php use_helper('Javascript') ?>
<div id="lista_elementos">
<form action="<?php echo url_for('comprobante/addItem') ?>" method="post">
  <table>
    <thead>
		<tr>
		  <th>Descripción</th>
		  <th>Imp total</th>
		  <th>Imp total conceptos</th>
		  <th>Imp neto</th>
		  <th>Imp liquidado</th>
		  <th>Imp liquidado rni</th>
		  <th>Imp operaciones ex</th>
		</tr>
	</thead>
	<tbody>
	  <?php foreach ($comprobante->getComprobanteItems() as $item): ?>
	  <tr>
	    <td><?php echo $item->getDescription() ?></td>
	    <td><?php echo $item->getImpTotal() ?></td>
	    <td><?php echo $item->getImpTotalConceptos() ?></td>
	    <td><?php echo $item->getImpNeto() ?></td>
	    <td><?php echo $item->getImpLiquidado() ?></td>
	    <td><?php echo $item->getImpLiquidadoRni() ?></td>
	    <td><?php echo $item->getImpOperacionesEx() ?></td>
	  </tr>
	  <?php endforeach; ?>
	  <tr>
	    <td>
	    	<?php echo $itemForm['description']?>
	    	<?php echo $itemForm['_csrf_token']?>
	    </td>
	    <td><?php echo $itemForm['imp_total']?></td>
	    <td><?php echo $itemForm['imp_total_conceptos']?></td>
	    <td><?php echo $itemForm['imp_neto']?></td>
	    <td><?php echo $itemForm['imp_liquidado']?></td>
	    <td><?php echo $itemForm['imp_liquidado_rni']?></td>
	    <td><?php echo $itemForm['imp_operaciones_ex']?></td>
	  </tr>
	</tbody>
    <tfoot>
      <tr>
        <td colspan="2">
              <?php echo submit_to_remote('envio_ajax', 'Anadir con Ajax', array(
        		'update'   => 'lista_elementos',
        		'url'      => 'comprobante/addItem',
    		  )) ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
</div>