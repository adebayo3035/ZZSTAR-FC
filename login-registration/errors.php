<?php
	if(count($errors)>0):
?>
<div class="error">
	 <h3> Error Message </h3><hr>
	<?php foreach ($errors as $error): ?>

		<p><img src="images/close-icon.png"> <?php echo $error; ?> </p>
		<?php endforeach ?>
	</div>
	<?php endif ?>
	
	<?php

//SUCCESSFUL REGISTRATION MESSAGE
	if(count($success)>0):
		?>
		<div class="error">
			<?php foreach ($success as $successful): ?>
				<p> <?php echo $successful; ?> </p>
				<?php endforeach ?>
			</div>
			<?php endif ?>

