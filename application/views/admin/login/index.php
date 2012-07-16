<?php echo validation_errors(); ?>

<form action="<?php echo site_url('admin/login'); ?>" method="post">
	
	<fieldset>
		
		<label for="">Username:</label>
		<input type="text" name="username" id="username" />
		
		<label for="">Password:</label>
		<input type="password" name="password" id="password" />
		
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
		
	</fieldset>
	
</form>
