<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <div id="header" class="header">HEAD</div>
   
    <div id="menu" class="menu">
   <div><a href="<?php echo url_for('cliente/index') ?>">Clientes</a></div>
   <div><a href="<?php echo url_for('comprobante/index') ?>">Comprobantes</a></div>
    </div>

    <div id="principal" class="principal"> 
       <div id="titulo" class="titulo">TITULO</div>
       <div id="contenido" class="contenido">
         <?php echo $sf_content ?>
       </div>
    </div>
    <hr/>
    <div id="footer" class="footer">FOOT</div>
   
  </body>
</html>
