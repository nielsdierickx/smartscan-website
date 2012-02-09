<div class="content_title">

  <div class="content_title_pattern">
    <div class="content_title_wrapper">

      <img src="resources/img/lock-icon-big.png" alt="icon">
      <h1><?php echo $title; ?></h1>
    
    </div>  
  </div>

</div>

<div id="main" role="main">
	
	<?php echo form_open('auth/login');?>
	
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
	
	<?php echo form_submit('submit', 'Aanmelden'); ?>
	
	<?php echo form_close(); ?>
	
	<div class="errors">
		<?php echo validation_errors(); ?>
	</div>
	
</div>

      