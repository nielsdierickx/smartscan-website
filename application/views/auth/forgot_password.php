<div class="content_title">
    <div class="content_title_pattern">
        <div class="content_title_wrapper">
            <img src="resources/img/lock-icon-big.png" alt="icon">
            <h1><?php echo $title; ?></h1>
        </div>  
    </div>
</div>

<div id="main" role="main">

	<div class="content_background">

	<p>Vul hieronder je e-mailadres in om je wachtwoord te resetten.</p>
    
    <div id="infoMessage"><?php echo $message;?></div>

	<?php echo form_open("auth/forgot_password");?>

	<p>
        <?php
            echo form_label('E-mail:', 'email');
            echo form_input($email);
        ?>
    </p>

    <?php echo form_error('email', '<div class="error">', '</div>'); ?>

    <p><?php echo form_submit('submit', 'Reset mijn wachtwoord');?></p>
      
	<?php echo form_close();?>

	</div>

</div>