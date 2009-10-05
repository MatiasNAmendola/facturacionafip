<?php 
$messageBox = new MessageBox();
$messageBox->popFromSession($sf_user);

if ($messageBox->isDefined()) : 
?>
<div class="<?php echo $messageBox->getClass() ?>" onclick="javascript:this.style.visibility='hidden'">
  <p>
	<?php echo $messageBox->getMessage() ?>
  </p>
</div>    
<?php endif; ?>