<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $cliente->getId() ?></td>
    </tr>
    <tr>
      <th>Razon social:</th>
      <td><?php echo $cliente->getRazonSocial() ?></td>
    </tr>
    <tr>
      <th>Tipo documento:</th>
      <td><?php echo $cliente->getTipoDocumentoId() ?></td>
    </tr>
    <tr>
      <th>Nro documento:</th>
      <td><?php echo $cliente->getNroDocumento() ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $cliente->getActivo() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $cliente->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $cliente->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $cliente->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cliente/edit?id='.$cliente->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('cliente/index') ?>">List</a>
