<?php if (isset($messageBox)) : ?>
<div class="<?php echo $messageBox->getClass() ?>" onclick="javascript:this.style.visibility='hidden'">
  <p>
	<?php echo $messageBox->getMessage() ?>
  </p>
</div>    
<?php endif; ?>