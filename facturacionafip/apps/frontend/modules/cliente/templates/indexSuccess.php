<h1>Cliente List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Razon social</th>
      <th>Tipo documento</th>
      <th>Nro documento</th>
      <th>Activo</th>
      <th>Direccion</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cliente_list as $cliente): ?>
    <tr>
      <td><a href="<?php echo url_for('cliente/show?id='.$cliente->getId()) ?>"><?php echo $cliente->getId() ?></a></td>
      <td><?php echo $cliente->getRazonSocial() ?></td>
      <td><?php echo $cliente->getTipoDocumentoId() ?></td>
      <td><?php echo $cliente->getNroDocumento() ?></td>
      <td><?php echo $cliente->getActivo() ?></td>
      <td><?php echo $cliente->getDireccion() ?></td>
      <td><?php echo $cliente->getCreatedAt() ?></td>
      <td><?php echo $cliente->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('cliente/new') ?>">New</a>
