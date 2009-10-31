<table>
  <tbody>
    <tr>
      <th>C&oacute;digo:</th>
      <td><?php echo $punto_venta->getCode() ?></td>
    </tr>
    <tr>
      <th>Descripci&oacute;n:</th>
      <td><?php echo $punto_venta->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />
<a href="<?php echo url_for('puntoVenta/edit?id='.$punto_venta->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('puntoVenta/delete?id='.$punto_venta->getId()) ?>">Borrar</a>
&nbsp;
<a href="<?php echo url_for('puntoVenta/index') ?>">Volver</a>