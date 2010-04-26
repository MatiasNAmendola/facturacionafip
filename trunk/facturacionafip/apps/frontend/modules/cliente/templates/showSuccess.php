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
    
    <?WebHelper::linkButton("Editar Cliente", url_for('cliente/edit?id='.$cliente->getId()));?>
    <?WebHelper::linkButton("Borrar Cliente", url_for('cliente/delete?id='.$cliente->getId()));?>

</div>


<div class="listaContactos" id="listaContactos">
    <div class="subtitulo" id="subtituloListaContactos">
      <h3>Contactos</h3>
    </div>

    <table>
      <thead>
	<tr>
	  <th>Nombre</th>
	  <th>Tel&eacute;fono</th>
	  <th>E-Mail</th>
	</tr>
      </thead>
      <tbody>
	<?php foreach ($contactos as $contacto): ?>
	<tr>
	  <td><a href="<?php echo url_for('contacto/show?id='.$contacto->getId()) ?>"><?php echo $contacto->getNombre() ?></a></td>
	  <td><?php echo $contacto->getTelefono() ?></td>
	  <td><?php echo $contacto->getEmail() ?></td>
	</tr>
	<?php endforeach; ?>
      </tbody>
    </table>
    <div id="linkBoton" class="linkBoton">
      <a href="<?php echo url_for('contacto/new?cliente_id='.$cliente->getId()) ?>">Nuevo</a>
    </div>

</div>

<div id="linkBoton" class="linkBoton">
    <a href="<?php echo url_for('cliente/index') ?>">Volver</a>
</div>
