<h1>Puntos de Venta</h1>

<table>
  <thead>
    <tr>
      <th>C&oacute;digo</th>
      <th>Descripci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($punto_venta_list as $punto_venta): ?>
    <tr>
      <td><a href="<?php echo url_for('puntoVenta/show?id='.$punto_venta->getId()) ?>"><?php echo $punto_venta->getCode() ?></a></td>
      <td><?php echo $punto_venta->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  <a href="<?php echo url_for('puntoVenta/new') ?>">Agregar Punto de Venta</a>
   <?php if(isset($messageBox)): ?>
<?php include_partial('global/messageBox', array('messageBox' => $messageBox)) ?>
   <?php endif;?>