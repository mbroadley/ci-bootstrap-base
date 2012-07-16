<?php
if(isset($updated)) {
	echo "<div class=\"alert alert-success\"><button class=\"close\" data-dismiss=\"alert\">×</button><strong>Success!</strong> User has been updated. <a href=\"" . site_url('admin/users/view') . "\">Click here to return to user list</a></div>";
}
?>

<div class="page-header">
	<h1>Edit User - <?php echo $info->username; ?></h1>
</div>

<form class="form-horizontal" method="post" action="<?php echo site_url('admin/users/edit/' . $info->id); ?>">
	<fieldset>
		<div class="control-group<?php echo ($this->form_validation->error_exists('forename') ? ' error' : ''); ?>">
			<label class="control-label" for="forename">Forename</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="forename" id="forename" value="<?php echo set_value('forename',$info->forename); ?>" />
				<?php echo form_error('forename'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('surname') ? ' error' : ''); ?>">
			<label class="control-label" for="surname">Surname</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="surname" id="surname" value="<?php echo set_value('surname',$info->surname); ?>" />
				<?php echo form_error('surname'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('email') ? ' error' : ''); ?>">
			<label class="control-label" for="email">Email address</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="email" id="email" value="<?php echo set_value('email',$info->email); ?>" />
				<?php echo form_error('email'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('username') ? ' error' : ''); ?>">
			<label class="control-label" for="username">Username</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="username" id="username" value="<?php echo set_value('username',$info->username); ?>" />
				<?php echo form_error('username'); ?>
				<p class="help-block"><strong>To change this user's password please complete both fields below.</strong></p>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('password') ? ' error' : ''); ?>">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<input type="password" class="input-xlarge" name="password" id="password" value="<?php echo set_value('password'); ?>" autocomplete="off" />
				<?php echo form_error('password'); ?>
			</div>
		</div>
		<div class="control-group<?php echo ($this->form_validation->error_exists('password') ? ' error' : ''); ?>">
			<label class="control-label" for="passwordconf">Confirm Password</label>
			<div class="controls">
				<input type="password" class="input-xlarge" name="passwordconf" id="passwordconf" value="<?php echo set_value('passwordconf'); ?>" autocomplete="off" />
				<?php echo form_error('passwordconf'); ?>
			</div>
		</div>
	</fieldset>

	<h2>Edit User Permissions<br /><small>Choose which application versions this user is allowed to edit</small></h2>

	<?php
	foreach($full_app_info as $app) {
		?>
		<fieldset>
			<legend><?php echo $app['info']->name; ?></legend>
			<?php
			foreach($app['versions'] as $version) {
			?>
			<div class="control-group">
				<label class="control-label"><?php echo $version->name; ?></label>
				<div class="controls">
					<?php $checked = (in_array($version->id,$user_app_info)) ? ' checked="checked"' : ''; ?>
					<input type="checkbox" name="version<?php echo $version->id; ?>" id="version<?php echo $version->id; ?>" value="1"<?php echo $checked; ?> />
				</div>
			</div>
			<?php
			}
			?>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Update User</button>
				<a href="<?php echo site_url('admin/users/view'); ?>"><button class="btn">Cancel</button></a>
			</div>
		</fieldset>		
		<?php	
	}
	?>
</form>