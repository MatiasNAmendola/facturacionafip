<h1>Contacto List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Cliente</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacto_list as $contacto): ?>
    <tr>
      <td><a href="<?php echo url_for('contacto/show?id='.$contacto->getId()) ?>"><?php echo $contacto->getId() ?></a></td>
      <td><?php echo $contacto->getNombre() ?></td>
      <td><?php echo $contacto->getTelefono() ?></td>
      <td><?php echo $contacto->getClienteId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contacto/new') ?>">New</a>
