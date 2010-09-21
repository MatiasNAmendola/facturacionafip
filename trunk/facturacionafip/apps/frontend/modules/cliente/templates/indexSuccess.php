<?php slot('title') ?>
Clientes
<?php end_slot(); ?>

<div>
  <?php if(sizeof($cliente_list) > 0): ?>
  <table>
    <thead>
      <tr>
	<th>Raz&oacute;n social</th>
	<th>Tipo de Documento</th>
	<th>Nro Documento</th>
	<th>Direcci&oacute;n</th>
	<th></th>
	<th></th>
	<th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cliente_list as $cliente): ?>
      <tr onclick="javascript:window.location='<?php echo url_for('cliente/show?id='.$cliente->getId());?>'">
	<td ><?php echo $cliente->getRazonSocial() ?></td>
	<td><?php echo $cliente->getTipoDocumento() ?></td>
	<td><?php echo $cliente->getNroDocumento() ?></td>
	<td><?php echo $cliente->getDireccion() ?></td>
    
	<td>
		<?php WebHelper::linkButton(array(
						  'target'=>url_for('cliente/show?id='.$cliente->getId()),
						  'linkClass'=>'btnVer'
						  )
					    );?>
	</td>

	<td>
		<?php WebHelper::linkButton(array(
						  'target'=>url_for('cliente/edit?id='.$cliente->getId()),
						  'linkClass'=>'btnEdit')
					   );?>
	</td>

	<td>
		<?php WebHelper::linkButton(array(
						  'target'=>url_for('cliente/delete?id='.$cliente->getId()),
						  'confirmMessage'=>'¿Está seguro de eliminar este Cliente?',
						  'linkClass'=>'btnX')
					    );?>
	</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
   <?php else: ?>
  <p>No existe informaci&oacute;n de Clientes</p>
   <?php 
      endif;
   ?>
</div>



<div class="smallMargins">
  <?php WebHelper::linkButton(array(
				    'text'=>'Nuevo Cliente', 
				    'target'=>url_for('cliente/new'),
				    'linkClass'=>'btnAdd'
				    
				   )
   			     );?>
</div>
