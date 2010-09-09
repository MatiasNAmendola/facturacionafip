<?php slot('title') ?>

<?php 
    echo 'Editando Cliente'
?>

<?php end_slot(); ?>

<?php include_partial('form', array('form' => $form, 'volver_a_cliente' => isset($volver_a_cliente) )) ?>

