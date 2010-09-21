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
      <h3>Contactos <img src="/images/icons/normal/people.gif" alt="" /></h3>
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
	<tr> 
	  <td><?php echo $contacto->getNombre() ?></td>
	  <td><?php echo $contacto->getTelefono() ?></td>
	  <td><?php echo $contacto->getEmail() ?></td>
	  <td>
		<?php WebHelper::linkButton(array(
				     'linkClass'=>'btnEdit',	
				     'target'=>url_for('contacto/edit?id='.$contacto->getId()))
			       );?>
	  </td>

	  <td>
		<?php WebHelper::linkButton(array(
				     'linkClass'=>'btnX',	
				     'target'=>url_for('contacto/delete?id='.$contacto->getId()),
				     'confirmMessage'=>"¿Está seguro de eliminar este contacto?"
				     )
			       );?>
	  </td>
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
