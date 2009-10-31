<h1>Contactos</h1>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Tel&eacute;fono</th>
      <th>Cliente</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacto_list as $contacto): ?>
    <tr>
      <td><a href="<?php echo url_for('contacto/show?id='.$contacto->getId()) ?>"><?php echo $contacto->getNombre()?></a></td>
      <td><?php echo $contacto->getTelefono() ?></td>
      <td><?php echo $contacto->getClienteId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contacto/new') ?>">Agregar contacto</a>
