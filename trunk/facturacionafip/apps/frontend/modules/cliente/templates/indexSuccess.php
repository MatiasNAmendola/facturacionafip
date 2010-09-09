<?php slot('title') ?>
Clientes
<?php end_slot(); ?>

<div>
  <?php if(sizeof($cliente_list) > 0): ?>
  <table>
    <thead>
      <tr>
	<th>Raz&oacute;n social</th>
	<th>Tipo de Documento</th>
	<th>Nro Documento</th>
	<th>Direcci&oacute;n</th>
	<th></th>
	<th></th>
	<th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cliente_list as $cliente): ?>
      <tr onclick="javascript:window.location='<?php echo url_for('cliente/show?id='.$cliente->getId());?>'">
	<td ><?php echo $cliente->getRazonSocial() ?></td>
	<td><?php echo $cliente->getTipoDocumento() ?></td>
	<td><?php echo $cliente->getNroDocumento() ?></td>
	<td><?php echo $cliente->getDireccion() ?></td>
    
	<td><?php WebHelper::linkButton("Ver", url_for('cliente/show?id='.$cliente->getId()));?></td>
	<td><?php WebHelper::linkButton("Editar", url_for('cliente/edit?id='.$cliente->getId()));?></td>
	<td><?php WebHelper::linkButton("Borrar", url_for('cliente/delete?id='.$cliente->getId()),"¿Está seguro de eliminar este Cliente?");?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
   <?php else: ?>
  <p>No existe informaci&oacute;n de Clientes</p>
   <?php 
      endif;
   ?>
</div>

<div id="linkBoton" class="linkBoton">
  <a href="<?php echo url_for('cliente/new')
 ?>">Nuevo Cliente</a>
</div>
