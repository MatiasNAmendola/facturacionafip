<h1>PuntoVenta List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Code</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($punto_venta_list as $punto_venta): ?>
    <tr>
      <td><a href="<?php echo url_for('puntoVenta/show?id='.$punto_venta->getId()) ?>"><?php echo $punto_venta->getId() ?></a></td>
      <td><?php echo $punto_venta->getCode() ?></td>
      <td><?php echo $punto_venta->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('puntoVenta/new') ?>">New</a>
<?php include_partial('global/messageBox', array('messageBox' => $messageBox)) ?>