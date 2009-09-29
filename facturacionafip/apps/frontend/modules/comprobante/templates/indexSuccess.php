<h1>Comprobante List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipo comprobante</th>
      <th>Nro comprobante</th>
      <th>Punto venta</th>
      <th>Fecha comprobante</th>
      <th>Cliente</th>
      <th>Cbt desde</th>
      <th>Cbt hasta</th>
      <th>Imp total</th>
      <th>Imp total conceptos</th>
      <th>Imp neto</th>
      <th>Imp liquidado</th>
      <th>Imp liquidado rni</th>
      <th>Imp operaciones ex</th>
      <th>Es servicio</th>
      <th>Fecha servicio desde</th>
      <th>Fecha servicio hasta</th>
      <th>Fecha vencimiento pago</th>
      <th>Cae</th>
      <th>Fecha cae</th>
      <th>Fecha vto cae</th>
      <th>Resultado</th>
      <th>Motivo</th>
      <th>Reproceso</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comprobante_list as $comprobante): ?>
    <tr>
      <td><a href="<?php echo url_for('comprobante/show?id='.$comprobante->getId()) ?>"><?php echo $comprobante->getId() ?></a></td>
      <td><?php echo $comprobante->getTipoComprobanteId() ?></td>
      <td><?php echo $comprobante->getNroComprobante() ?></td>
      <td><?php echo $comprobante->getPuntoVentaId() ?></td>
      <td><?php echo $comprobante->getFechaComprobante() ?></td>
      <td><?php echo $comprobante->getClienteId() ?></td>
      <td><?php echo $comprobante->getCbtDesde() ?></td>
      <td><?php echo $comprobante->getCbtHasta() ?></td>
      <td><?php echo $comprobante->getImpTotal() ?></td>
      <td><?php echo $comprobante->getImpTotalConceptos() ?></td>
      <td><?php echo $comprobante->getImpNeto() ?></td>
      <td><?php echo $comprobante->getImpLiquidado() ?></td>
      <td><?php echo $comprobante->getImpLiquidadoRni() ?></td>
      <td><?php echo $comprobante->getImpOperacionesEx() ?></td>
      <td><?php echo $comprobante->getEsServicio() ?></td>
      <td><?php echo $comprobante->getFechaServicioDesde() ?></td>
      <td><?php echo $comprobante->getFechaServicioHasta() ?></td>
      <td><?php echo $comprobante->getFechaVencimientoPago() ?></td>
      <td><?php echo $comprobante->getCae() ?></td>
      <td><?php echo $comprobante->getFechaCae() ?></td>
      <td><?php echo $comprobante->getFechaVtoCae() ?></td>
      <td><?php echo $comprobante->getResultado() ?></td>
      <td><?php echo $comprobante->getMotivo() ?></td>
      <td><?php echo $comprobante->getReproceso() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('comprobante/new') ?>">New</a>
<?php include_partial('global/messageBox', array('messageBox' => $messageBox)) ?>