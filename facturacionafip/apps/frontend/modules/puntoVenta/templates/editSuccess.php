<?php slot('title') ?>

<?php 
    echo 'Editando Punto de Venta: '. $form->getObject()->getCode();
?>

<?php end_slot(); ?>


<?php include_partial('form', array('form' => $form)) ?>