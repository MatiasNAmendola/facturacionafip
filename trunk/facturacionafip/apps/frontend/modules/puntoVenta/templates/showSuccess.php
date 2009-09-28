<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $punto_venta->getId() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $punto_venta->getCode() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $punto_venta->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('puntoVenta/index') ?>">List</a>
