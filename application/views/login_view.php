<div id="main" role="main">
	
	<h1>Login</h1>
	
	<?php echo form_open('login');?>
	
	<p>
		<?php
			echo form_label('Email:', 'email_address');
			echo form_input('email_address', '', 'id="email_address"');
		?>
	</p>
	
	<p>
		<?php
			echo form_label('Password:', 'password');
			echo form_password('password', '', 'id="password"');
		?>
	</p>
	
	<?php echo form_submit('submit', 'Login'); ?>
	
	<?php echo form_close(); ?>
	
	<div class="errors">
		<?php echo validation_errors(); ?>
	</div>
	
</div>
      