<?php use_helper('Form') ?>
<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php
$cliente_id = $form->getObject()->getId();
if(!isset($volver_a_cliente)) $volver_a_cliente = 0;  
?>
<form name="clienteForm" action="<?php echo url_for('cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>



<?php echo input_hidden_tag('volver_a_cliente', $volver_a_cliente?"true":"false") ?>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
	<?php if(isset($volver_a_cliente) && $volver_a_cliente == 1):
	  $return_to=url_for('cliente/show?id='.$cliente_id);
	else:
	  $return_to=url_for('cliente/index');
	endif;?>

	  <div style="float:left" class="smallMargins">
		<?php WebHelper::linkButton(array(
					       'linkClass'=>'btnBack',
					       'text'=>'Cancelar',
					       'target'=>$return_to)
					       );?>
	  </div>

	  <div style="float:left" class="smallMargins">&nbsp;</div>
	  <div  class="smallMargins">
		<?php WebHelper::linkButton(array(
					       'linkClass'=>'btnOk',
					       'text'=>'Confirmar',
					       'target'=>"#",
					       'clickAction'=>'document.clienteForm.submit()')
					       );?>
	  </div>


        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
