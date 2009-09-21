<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $comprobante->getId() ?></td>
    </tr>
    <tr>
      <th>Tipo comprobante:</th>
      <td><?php echo $comprobante->getTipoComprobanteId() ?></td>
    </tr>
    <tr>
      <th>Nro comprobante:</th>
      <td><?php echo $comprobante->getNroComprobante() ?></td>
    </tr>
    <tr>
      <th>Punto venta:</th>
      <td><?php echo $comprobante->getPuntoVenta() ?></td>
    </tr>
    <tr>
      <th>Fecha comprobante:</th>
      <td><?php echo $comprobante->getFechaComprobante() ?></td>
    </tr>
    <tr>
      <th>Cliente:</th>
      <td><?php echo $comprobante->getClienteId() ?></td>
    </tr>
    <tr>
      <th>Cbt desde:</th>
      <td><?php echo $comprobante->getCbtDesde() ?></td>
    </tr>
    <tr>
      <th>Cbt hasta:</th>
      <td><?php echo $comprobante->getCbtHasta() ?></td>
    </tr>
    <tr>
      <th>Imp total:</th>
      <td><?php echo $comprobante->getImpTotal() ?></td>
    </tr>
    <tr>
      <th>Imp total conceptos:</th>
      <td><?php echo $comprobante->getImpTotalConceptos() ?></td>
    </tr>
    <tr>
      <th>Imp neto:</th>
      <td><?php echo $comprobante->getImpNeto() ?></td>
    </tr>
    <tr>
      <th>Imp liquidado:</th>
      <td><?php echo $comprobante->getImpLiquidado() ?></td>
    </tr>
    <tr>
      <th>Imp liquidado rni:</th>
      <td><?php echo $comprobante->getImpLiquidadoRni() ?></td>
    </tr>
    <tr>
      <th>Imp operaciones ex:</th>
      <td><?php echo $comprobante->getImpOperacionesEx() ?></td>
    </tr>
    <tr>
      <th>Fecha servicio desde:</th>
      <td><?php echo $comprobante->getFechaServicioDesde() ?></td>
    </tr>
    <tr>
      <th>Fecha servicio hasta:</th>
      <td><?php echo $comprobante->getFechaServicioHasta() ?></td>
    </tr>
    <tr>
      <th>Fecha vencimiento pago:</th>
      <td><?php echo $comprobante->getFechaVencimientoPago() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('comprobante/edit?id='.$comprobante->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('comprobante/index') ?>">List</a>
