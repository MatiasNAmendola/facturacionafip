<a href="<?php echo url_for('comprobante/new') ?>">Emitir Nuevo Comprobante</a>

<h1>Comprobantes Emitidos</h1>

<table>
  <thead>
    <tr>
      <th>Nro comprobante</th>
      <th>Tipo comprobante</th>
      <th>Punto de venta</th>
      <th>Fecha del comprobante</th>
      <th>Cliente</th>
      <th>Imp total</th>
      <th>Imp total conceptos</th>
      <th>Imp neto</th>
      <th>Imp liquidado</th>
      <th>Imp liquidado rni</th>
      <th>Imp operaciones ex</th>
      <th>Cae</th>
      <th>Fecha cae</th>
      <th>Fecha vto cae</th>
      <th>Fecha vencimiento pago</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($comprobante_list as $comprobante): ?>
    <tr>
      <td><a href="<?php echo url_for('comprobante/show?id='.$comprobante->getId()) ?>"><?php echo $comprobante->getNroComprobante() ?></a></td>
      <td><?php echo $comprobante->getTipoComprobante() ?></td>
      <td><?php echo $comprobante->getPuntoVenta() ?></td>
      <td><?php echo $comprobante->getFechaComprobante('d/M/y') ?></td>
      <td><?php echo $comprobante->getCliente() ?></td>
      <td><?php echo $comprobante->getImpTotal() ?></td>
      <td><?php echo $comprobante->getImpTotalConceptos() ?></td>
      <td><?php echo $comprobante->getImpNeto() ?></td>
      <td><?php echo $comprobante->getImpLiquidado() ?></td>
      <td><?php echo $comprobante->getImpLiquidadoRni() ?></td>
      <td><?php echo $comprobante->getImpOperacionesEx() ?></td>
      <td><?php echo $comprobante->getCae() ?></td>
      <td><?php echo $comprobante->getFechaCae('d/M/y') ?></td>
      <td><?php echo $comprobante->getFechaVtoCae('d/M/y') ?></td>
      <td><?php echo $comprobante->getFechaVencimientoPago('d/M/y') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>