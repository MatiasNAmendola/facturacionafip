<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body id="body">


       <div class="box">
       <div class="cornerGray TL"></div>
       <div class="cornerGray TR"></div>
       <div class="cornerGray BL"></div>
       <div class="cornerGray BR"></div>
       <div class="cornerBoxInner gray">
       <div class="borderFillerL gray"></div>
       <div class="borderFillerR gray"></div>

    <div id="header" class="header">
       <p>
          <a href="<?php echo url_for('home/index') ?>">FACTURACION AFIP</a>
       <P>
    </div>

</div>
</div>

   
    <div id="menu" class="menu">
   
       <div class="box">
       <div class="cornerGray TL"></div>
       <div class="cornerGray TR"></div>
       <div class="cornerGray BL"></div>
       <div class="cornerGray BR"></div>
       <div class="cornerBoxInner gray">
       <div class="borderFillerL gray"></div>
       <div class="borderFillerR gray"></div>




  <span><a href="<?php echo url_for('cliente/index') ?>">Clientes</a></span>
   <span> &nbsp;|&nbsp;  </span>
   <span><a href="<?php echo url_for('comprobante/index') ?>">Comprobantes</a></span>
   <span> &nbsp;|&nbsp;  </span>
   <span><a href="<?php echo url_for('puntoVenta/index') ?>">Puntos de venta</a></

span>

        </div>

    </div>
   <table class = "centered">
   <tr>
   <td>
       <div class="box">
       <div class="cornerGray TL"></div>
       <div class="cornerGray TR"></div>
       <div class="cornerGray BL"></div>
       <div class="cornerGray BR"></div>


       <div class="borderFillerL gray"></div>
       <div class="borderFillerR gray"></div>

       <div class="cornerBoxInner gray">


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
   
         </div>
        </div>
   </td>
   </tr>
   </table>


    <div id="separadorFinal" class="separadorFinal">
       <hr/>
    </div>

    <div id="footer" class="footer">Powered by symfony  -  Todos los derechos reservados</div>

    <?php include_partial('global/messageBox') ?>
  </body>
</html>
