<?php slot('title') ?>

<?php 
echo 'Detalles del Cliente';
?>

<?php end_slot(); ?>

<div id="datosCliente" class="datosCliente" >
    <table>
      <tbody>
	<tr>
	  <th>Raz&oacute;n Social:</th>
	  <td><?php echo $cliente->getRazonSocial() ?></td>
	</tr>
	<tr>
	  <th>Tipo de Documento:</th>
	  <td><?php echo $cliente->getTipoDocumento() ?></td>
	</tr>
	<tr>
	  <th>Nro Documento:</th>
	  <td><?php echo $cliente->getNroDocumento() ?></td>
	</tr>
	<tr>
	  <th>Direcci&oacute;n:</th>
	  <td><?php echo $cliente->getDireccion() ?></td>
	</tr>
      </tbody>
    </table>
    <div style="float:left" class="smallMargins">
    <?php WebHelper::linkButton(array(
				     'linkClass'=>'btnEdit',	
				     'text'=>'Editar Cliente',
				     'target'=>url_for('cliente/edit?id='.$cliente->getId().'&volver_a=cliente'))
			       );?>
    </div>
    <div style="float:left" class = "smallMargins"> &nbsp</div>
    <div   class = "smallMargins">
    <?php WebHelper::linkButton(array(
				     'linkClass'=>'btnX',	
				     'text'=>'Borrar Cliente',
				     'target'=>url_for('cliente/delete?id='.$cliente->getId()),
				     'confirmMessage'=>'¿Está seguro de eliminar este cliente?')
				     );?>
    </div>
</div>

<div class="listaContactos" id="listaContactos">
    <?php if(sizeof($contactos)>0): ?>
    <div class="subtitulo" id="subtituloListaContactos">
      <h3>Contactos</h3>
    </div>

    <table>
      <thead>
	<tr>
	  <th>Nombre</th>
	  <th>Tel&eacute;fono</th>
	  <th>E-Mail</th>
	  <th></th>
	  <th></th>
	</tr>
      </thead>
      <tbody>
	<?php foreach ($contactos as $contacto): ?>
	<tr onclick="javascript:window.location='<?php echo url_for('contacto/edit?id='.$contacto->getId()) ?>'">
	  <td><?php echo $contacto->getNombre() ?></td>
	  <td><?php echo $contacto->getTelefono() ?></td>
	  <td><?php echo $contacto->getEmail() ?></td>
	  <td><a href="<?php echo url_for('contacto/edit?id='.$contacto->getId()) ?>">Editar</a></td>
	  <td><a onclick='javascript:return confirm("¿Está seguro de eliminar este contacto?")' href="<?php echo url_for('contacto/delete?id='.$contacto->getId()) ?>">Borrar</a></td></td>
	</tr>
	<?php endforeach; ?>
      </tbody>
    </table>
    

    <?php endif;?>

   <div class="smallMargins">
      <?php WebHelper::linkButton(array(
				     'linkClass'=>'btnAdd',
				     'text'=>'Agregar Contacto',
				     'target'=>url_for('contacto/new?cliente_id='.$cliente->getId()))
				     );?>

    </div>

</div>
    <hr/>


<div class="smallMargins">
      <?php WebHelper::linkButton(array(
				     'linkClass'=>'btnBack',
				     'text'=>'Volver',
				     'target'=>url_for('cliente/index'))
				     );?>
</div>
