<table>
  <tbody>
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
<a href="<?php echo url_for('puntoVenta/edit?id='.$punto_venta->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('puntoVenta/delete?id='.$punto_venta->getId()) ?>">Delete</a>
&nbsp;
<a href="<?php echo url_for('puntoVenta/index') ?>">List</a>