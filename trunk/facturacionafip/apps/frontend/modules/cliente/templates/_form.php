<?php use_helper('Form') ?>
<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php
$cliente_id = $form->getObject()->getId();
?>
<form action="<?php echo url_for('cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php echo input_hidden_tag('volver_a_cliente', $volver_a_cliente?"true":"false") ?>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
	<?php if(isset($volver_a_cliente) && $volver_a_cliente == 1): ?>
          &nbsp;<a href="<?php echo url_for('cliente/show?id='.$cliente_id) ?>">Cancelar</a>

	<?php else: ?>

          &nbsp;<a href="<?php echo url_for('cliente/index') ?>">Cancelar</a>
	<?php endif;?>
          <input type="submit" value="Aceptar" />

        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
