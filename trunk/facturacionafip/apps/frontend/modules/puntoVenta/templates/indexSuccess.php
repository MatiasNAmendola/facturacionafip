<?php slot('title') ?>
Puntos de Venta
<?php end_slot(); ?>


<h1>Puntos de Venta</h1>
<div>
  <?php if(sizeof($punto_venta_list) > 0): ?>
<table>
  <thead>
    <tr>
      <th>C&oacute;digo</th>
      <th>Descripci&oacute;n</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($punto_venta_list as $punto_venta): ?>
    <tr>
      <td><?php echo $punto_venta->getCode() ?></a></td>
      <td><?php echo $punto_venta->getDescription() ?></td>
	<td>
		<?php WebHelper::linkButton(array(
						  'target'=>url_for('puntoVenta/edit?id='.$punto_venta->getId()),
						  'linkClass'=>'btnEdit')
					   );?>
	</td>

	<td>
		<?php WebHelper::linkButton(array(
						  'target'=>url_for('puntoVenta/delete?id='.$punto_venta->getId()),
						  'confirmMessage'=>'¿Está seguro de eliminar este Punto de Venta?',
						  'linkClass'=>'btnX')
					    );?>
	</td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
   <?php else: ?>
  <p>No se han definido Puntos de Venta</p>
   <?php 
      endif;
   ?>
</div>


<div class="smallMargins">
  <?php WebHelper::linkButton(array(
				    'text'=>'Nuevo Punto de Venta', 
				    'target'=>url_for('puntoVenta/new'),
				    'linkClass'=>'btnAdd'
				    
				   )
   			     );?>
</div>
