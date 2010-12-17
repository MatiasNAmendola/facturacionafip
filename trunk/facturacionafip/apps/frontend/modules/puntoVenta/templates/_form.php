<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form name="puntoVentaForm" action="<?php echo url_for('puntoVenta/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
	  <div style="float:left" class="smallMargins">
		<?php WebHelper::linkButton(array(
					       'linkClass'=>'btnBack',
					       'text'=>'Cancelar',
					       'target'=>url_for('puntoVenta/index'))
					       );?>
	  </div>

	  <div style="float:left" class="smallMargins">&nbsp;</div>
	  <div  class="smallMargins">
		<?php WebHelper::linkButton(array(
					       'linkClass'=>'btnOk',
					       'text'=>'Confirmar',
					       'target'=>"#",
					       'clickAction'=>'document.puntoVentaForm.submit()')
					       );?>
	  </div>
        </td>
      </tr>
    </tfoot>
    <tbody>
    <?php if ($form->getObject()->isNew()) {?>
      <?php echo $form ?>
    <?php } else {?>
      <?php echo $form['description']->renderRow() ?>
    <?php } ?>
    </tbody>
  </table>
</form>
