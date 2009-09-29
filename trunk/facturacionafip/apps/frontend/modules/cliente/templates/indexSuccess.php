<?php slot('title') ?>
Clientes
<?php end_slot(); ?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Razon social</th>
      <th>Tipo documento</th>
      <th>Nro documento</th>
      <th>Direccion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cliente_list as $cliente): ?>
    <tr>
      <td><a href="<?php echo url_for('cliente/show?id='.$cliente->getId()) ?>"><?php echo $cliente->getId() ?></a></td>
      <td><?php echo $cliente->getRazonSocial() ?></td>
      <td><?php echo $cliente->getTipoDocumentoId() ?></td>
      <td><?php echo $cliente->getNroDocumento() ?></td>
      <td><?php echo $cliente->getDireccion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="linkBoton" class="linkBoton">
  <a href="<?php echo url_for('cliente/new')
 ?>">Nuevo Cliente</a>
</div>
<?php include_partial('global/messageBox', array('messageBox' => $messageBox)) ?>