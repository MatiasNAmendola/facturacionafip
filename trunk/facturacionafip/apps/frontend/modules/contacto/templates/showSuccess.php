<?php slot('title') ?>

<?php 
echo 'Detalles del contacto';
?>

<?php end_slot(); ?>
<div id="datosContacto" class="datosContacto">
    <table>
      <tbody>
	<tr>
	  <th>Id:</th>
	  <td><?php echo $contacto->getId() ?></td>
	</tr>
	<tr>
	  <th>Nombre:</th>
	  <td><?php echo $contacto->getNombre() ?></td>
	</tr>
	<tr>
	  <th>Telefono:</th>
	  <td><?php echo $contacto->getTelefono() ?></td>
	</tr>
	<tr>
	  <th>Cliente:</th>
	  <td><?php echo $contacto->getClienteId() ?></td>
	</tr>
      </tbody>
    </table>

    <div class="linkBoton" id="linkBoton">
        <a href="<?php echo url_for('contacto/edit?id='.$contacto->getId()) ?>">Editar Contacto</a>
    </div>
</div>

   
<div class="linkBoton" id="linkBoton">
    <a href="<?php echo url_for('cliente/show?id='.$contacto->getCliente()->getId()) ?>">Volver</a>
</div>