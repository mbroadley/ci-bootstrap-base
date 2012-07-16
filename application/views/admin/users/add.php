<div class="page-header">
	<h1>Add User</h1>
</div>

<form class="form-horizontal" method="post" action="<?php echo site_url('admin/users/add'); ?>">
	<fieldset>
		<div class="control-group<?php echo ($this->form_validation->error_exists('forename') ? ' error' : ''); ?>">
			<label class="control-label" for="forename">Forename</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="forename" id="forename" value="<?php echo set_value('forename'); ?>" />
				<?php echo form_error('forename'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('surname') ? ' error' : ''); ?>">
			<label class="control-label" for="surname">Surname</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="surname" id="surname" value="<?php echo set_value('surname'); ?>" />
				<?php echo form_error('surname'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('email') ? ' error' : ''); ?>">
			<label class="control-label" for="email">Email address</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="email" id="email" value="<?php echo set_value('email'); ?>" />
				<?php echo form_error('email'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('username') ? ' error' : ''); ?>">
			<label class="control-label" for="username">Username</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="username" id="username" value="<?php echo set_value('username'); ?>" />
				<?php echo form_error('username'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('password') ? ' error' : ''); ?>">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" class="input-xlarge" name="password" id="password" value="<?php echo set_value('password'); ?>" autocomplete="off" />
				<?php echo form_error('password'); ?>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Add User</button>
			<a href="<?php echo site_url('admin/users/view'); ?>"><button class="btn">Cancel</button></a>
		</div>
	</fieldset>
</form>