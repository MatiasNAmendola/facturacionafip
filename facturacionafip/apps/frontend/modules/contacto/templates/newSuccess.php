<?php slot('title') ?>

<?php 
echo '('.$cliente->__toString().')  -  Nuevo Contacto';
?>

<?php end_slot(); ?>


<?php include_partial('form', array('form' => $form, 'cliente' => $cliente)) ?>
