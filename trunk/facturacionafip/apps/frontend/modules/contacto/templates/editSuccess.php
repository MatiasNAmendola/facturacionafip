<?php slot('title') ?>

<?php 
echo 'Editar Contacto';
?>

<?php end_slot(); ?>

<?php include_partial('form', array('form' => $form, 'cliente' => $cliente)) ?>
