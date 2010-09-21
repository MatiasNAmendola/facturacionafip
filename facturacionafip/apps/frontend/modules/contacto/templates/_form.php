<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form name="contactoForm" action="<?php echo url_for('contacto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
					       'target'=>url_for('cliente/show/?id='.$cliente->getId()))
					       );?>
	  </div>

	  <div style="float:left" class="smallMargins">&nbsp;</div>
	  <div  class="smallMargins">
		<?php WebHelper::linkButton(array(
					       'linkClass'=>'btnOk',
					       'text'=>'Confirmar',
					       'target'=>"#",
					       'clickAction'=>'document.contactoForm.submit()')
					       );?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
