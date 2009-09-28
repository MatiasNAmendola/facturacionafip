<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <div id="header" class="header">
       <p>
          <a href="<?php echo url_for('home/index') ?>">FACTURACION AFIP</a>
       <P>
    </div>
   
    <div id="menu" class="menu">
   <div><a href="<?php echo url_for('cliente/index') ?>">Clientes</a></div>
   <div><a href="<?php echo url_for('comprobante/index') ?>">Comprobantes</a></div>
   <div><a href="<?php echo url_for('puntoVenta/index') ?>">Puntos de venta</a></div>
    </div>

    <div id="principal" class="principal"> 
       <div id="titulo" class="titulo">
           <h1>
               <?php if (!include_slot('title')): ?>
                    Bienvenido
               <?php endif; ?>
            </h1>
        </div>
       <div id="contenido" class="contenido">
         <?php echo $sf_content ?>
       </div>
    </div>

    <div id="separadorFinal" class="separadorFinal">
       <hr/>
    </div>

    <div id="footer" class="footer">Powered by symfony  -  Todos los derechos reservados</div>
   
  </body>
</html>
