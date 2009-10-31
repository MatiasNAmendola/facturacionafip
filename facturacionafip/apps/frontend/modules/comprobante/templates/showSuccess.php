<table>
  <tbody>
    <tr>
      <th>Tipo de comprobante:</th>
      <td><?php echo $comprobante->getTipoComprobante() ?></td>
      <th>Nro de comprobante:</th>
      <td><?php echo $comprobante->getNroComprobante() ?></td>
    </tr>
    <tr>
      <th>Punto venta:</th>
      <td><?php echo $comprobante->getPuntoVenta() ?></td>
      <th>Fecha del comprobante:</th>
      <td><?php echo $comprobante->getFechaComprobante('d/M/y') ?></td>
    </tr>
    <tr>
      <th>Cliente:</th>
      <td colspan="3"><?php echo $comprobante->getCliente() ?></td>
    </tr>
    <tr>
      <th>Imp total:</th>
      <td><?php echo $comprobante->getImpTotal() ?></td>
      <th>Imp total conceptos:</th>
      <td><?php echo $comprobante->getImpTotalConceptos() ?></td>
    </tr>
    <tr>
      <th>Imp neto:</th>
      <td><?php echo $comprobante->getImpNeto() ?></td>
      <th>Imp liquidado:</th>
      <td><?php echo $comprobante->getImpLiquidado() ?></td>
    </tr>
    <tr>
      <th>Imp liquidado rni:</th>
      <td><?php echo $comprobante->getImpLiquidadoRni() ?></td>
      <th>Imp operaciones ex:</th>
      <td><?php echo $comprobante->getImpOperacionesEx() ?></td>
    </tr>
    <tr>
      <th>Es servicio:</th>
      <td colspan="3"><?php echo $comprobante->getEsServicioSiNo() ?></td>
    </tr>
    <tr>
      <th>Fecha servicio desde:</th>
      <td><?php echo $comprobante->getFechaServicioDesde('d/M/y') ?></td>
      <th>Fecha servicio hasta:</th>
      <td><?php echo $comprobante->getFechaServicioHasta('d/M/y') ?></td>
    </tr>
    <tr>
      <th>Fecha vencimiento pago:</th>
      <td colspan="3"><?php echo $comprobante->getFechaVencimientoPago('d/M/y') ?></td>
    </tr>
    <tr>
      <th>CAE:</th>
      <td colspan="3"><?php echo $comprobante->getCae() ?></td>
    </tr>
    <tr>
      <th>Fecha CAE:</th>
      <td><?php echo $comprobante->getFechaCae('d/M/y') ?></td>
      <th>Fecha vto CAE:</th>
      <td><?php echo $comprobante->getFechaVtoCae('d/M/y') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('comprobante/index') ?>">Volver</a>