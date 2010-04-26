<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>

	<div class="box light_green app_header">
		<div id="app_title">
			<a href="<?php echo url_for('home/index') ?>">FACTURACION AFIP</a>
		</div>
	</div>

	<? WebHelper::vseparator("1%"); ?>
	<div id="menu" class="box light_blue">
		<span class="menu_item">
			<a href="<?php echo url_for('cliente/index') ?>">Clientes</a>
		</span>

		<span> &nbsp;|&nbsp;  </span>

		<span class="menu_item">
			<a href="<?php echo url_for('comprobante/index') ?>">Comprobantes</a>
		</span>

		<span> &nbsp;|&nbsp;  </span>

		<span class="menu_item">
			<a href="<?php echo url_for('puntoVenta/index') ?>">Puntos de venta</a>
		</span>
	</div>



	<div id="body">
		<?php include_partial('global/messageBox') ?>

		<div class="box">
			<div id="principal" class="principal"> 

				<?php if(has_slot('title')): ?>

					<div id="titulo" class="titulo">
						<h1>
						  <?php include_slot('title'); ?>
						</h1>
					</div>

				<?php else: ?>

					<div id="welcome" class="welcome">
						<h1>
						    Bienvenido
						</h1>
					</div>
			
				<?php endif; ?>

				<div id="contenido" class="contenido ">
					<?php echo $sf_content ?> 
				</div>
			</div>
		</div>
	</div><!-- body -->

	<div id="separadorFinal" class="separadorFinal">
		<hr class="separadorFinal"/>
	</div>
	<table class="centered" >
		<tbody>
			<tr>
				<td>
					<div id="footer" class="footer">Powered by symfony  -  Todos los derechos reservados</div>
				</td>
			</tr>
		</tbody>
	</table>
  </body>
</html>
