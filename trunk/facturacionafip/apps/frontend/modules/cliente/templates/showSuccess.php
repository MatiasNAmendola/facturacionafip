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
    
    <?php WebHelper::linkButton("Editar Cliente", url_for('cliente/edit?id='.$cliente->getId()));?>
    <?php WebHelper::linkButton("Borrar Cliente", url_for('cliente/delete?id='.$cliente->getId()));?>

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
	</tr>
      </thead>
      <tbody>
	<?php foreach ($contactos as $contacto): ?>
	<tr>
	  <td><a href="<?php echo url_for('contacto/edit?id='.$contacto->getId()) ?>"><?php echo $contacto->getNombre() ?></a></td>
	  <td><?php echo $contacto->getTelefono() ?></td>
	  <td><?php echo $contacto->getEmail() ?></td>
	  <td><a onclick='javascript:return confirm("¿Está seguro de eliminar este contacto?")' href="<?php echo url_for('contacto/delete?id='.$contacto->getId()) ?>">Borrar</a></td></td>
	</tr>
	<?php endforeach; ?>
      </tbody>
    </table>
    

    <?php endif;?>

    <div id="linkBoton" class="linkBoton">
<p>
      <a href="<?php echo url_for('contacto/new?cliente_id='.$cliente->getId()) ?>">Agregar Contacto</a></p>
    </div>

</div>

<div id="linkBoton" class="linkBoton">
    <a href="<?php echo url_for('cliente/index') ?>">Volver</a>
</div>
