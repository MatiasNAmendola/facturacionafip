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
      <td><?php echo $comprobante->getPuntoVentaId() ?></td>
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
      <th>Es servicio:</th>
      <td><?php echo $comprobante->getEsServicio() ?></td>
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
    <tr>
      <th>Cae:</th>
      <td><?php echo $comprobante->getCae() ?></td>
    </tr>
    <tr>
      <th>Fecha cae:</th>
      <td><?php echo $comprobante->getFechaCae() ?></td>
    </tr>
    <tr>
      <th>Fecha vto cae:</th>
      <td><?php echo $comprobante->getFechaVtoCae() ?></td>
    </tr>
    <tr>
      <th>Resultado:</th>
      <td><?php echo $comprobante->getResultado() ?></td>
    </tr>
    <tr>
      <th>Motivo:</th>
      <td><?php echo $comprobante->getMotivo() ?></td>
    </tr>
    <tr>
      <th>Reproceso:</th>
      <td><?php echo $comprobante->getReproceso() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('comprobante/index') ?>">List</a>
<?php include_partial('global/messageBox', array('messageBox' => $messageBox)) ?>