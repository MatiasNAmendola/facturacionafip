<?php 
$messageBox = new MessageBox();
$messageBox->popFromSession($sf_user);

if ($messageBox->isDefined()) : 
?>
       <div class="box <?php echo $messageBox->getClass()?>"  onclick="javascript:this.style.display='none'">


<?php echo $messageBox->getMessage() ?>

        </div>

<?php endif; ?>
