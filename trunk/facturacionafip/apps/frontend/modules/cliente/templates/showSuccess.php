<?php slot('title') ?>

<?php 
echo 'Detalles del Cliente';
?>

<?php end_slot(); ?>

<div id="datosCliente" class="datosCliente" >
    <table>
      <tbody>
	<tr>
	  <th>Id:</th>
	  <td><?php echo $cliente->getId() ?></td>
	</tr>
	<tr>
	  <th>Razon social:</th>
	  <td><?php echo $cliente->getRazonSocial() ?></td>
	</tr>
	<tr>
	  <th>Tipo documento:</th>
	  <td><?php echo $cliente->getTipoDocumentoId() ?></td>
	</tr>
	<tr>
	  <th>Nro documento:</th>
	  <td><?php echo $cliente->getNroDocumento() ?></td>
	</tr>
	<tr>
	  <th>Direccion:</th>
	  <td><?php echo $cliente->getDireccion() ?></td>
	</tr>
      </tbody>
    </table>

    <div id="linkBoton" class="linkBoton">
        <a href="<?php echo url_for('cliente/edit?id='.$cliente->getId()) ?>">Editar Cliente</a>
    </div>
</div>


<div class="listaContactos" id="listaContactos">
    <div class="subtitulo" id="subtituloListaContactos">
      <h3>Contactos</h3>
    </div>

    <table>
      <thead>
	<tr>
	  <th>Id</th>
	  <th>Nombre</th>
	  <th>Telefono</th>
	  <th>E-Mail</th>
	</tr>
      </thead>
      <tbody>
	<?php foreach ($contactos as $contacto): ?>
	<tr>
	  <td><a href="<?php echo url_for('contacto/show?id='.$contacto->getId()) ?>"><?php echo $contacto->getId() ?></a></td>
	  <td><?php echo $contacto->getNombre() ?></td>
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


