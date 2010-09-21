<?php 
$messageBox = new MessageBox();
$messageBox->popFromSession($sf_user);

if ($messageBox->isDefined()) : 
?>
       <div class="box <?php echo $messageBox->getClass()?>"  onclick="javascript:this.style.display='none'">

<img src="/images/icons/normal/<?php echo $messageBox->getImg()?>" alt=""/> &nbsp;
<span ><?php echo $messageBox->getMessage() ?> </span>

        </div>

<?php endif; ?>
