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
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cliente_list as $cliente): ?>
      <tr>
	<td><a href="<?php echo url_for('cliente/show?id='.$cliente->getId()) ?>"><?php echo $cliente->getRazonSocial() ?></a></td>
	<td><?php echo $cliente->getTipoDocumento() ?></td>
	<td><?php echo $cliente->getNroDocumento() ?></td>
	<td><?php echo $cliente->getDireccion() ?></td>
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
