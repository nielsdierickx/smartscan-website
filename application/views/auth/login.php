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
    
    <?php echo form_open("auth/login");?>

    <div id="infoMessage"><?php echo $message;?></div>

    <p>
        <?php
            echo form_label('E-mail:', 'identity');
            echo form_input($identity);
        ?>
    </p>

    <?php echo form_error('identity', '<div class="error">', '</div>'); ?>

    <p>
        <?php
            echo form_label('Wachtwoord:', 'password');
            echo form_input($password);
        ?>
    </p>

    <?php echo form_error('password', '<div class="error">', '</div>'); ?>

    <p><a href="auth/forgot_password">Ik ben mijn wachtwoord vergeten</a></p>

    <p>
	   <?php 
            echo form_submit('submit', 'Aanmelden');
            echo form_checkbox($remember_checkbox);
            echo form_label('Gegevens onthouden', '', $remember_label);
        ?>
    </p>
     
    <?php echo form_close();?>

    </div>

</div>
