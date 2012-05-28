<div class="content_title">
        <div class="content_title_wrapper">
            <img src="resources/img/list-bullet.png" alt="icon">
            <h1><?php echo $title; ?></h1>
        </div>
</div>

<div id="main" role="main">

    <div class="column-left">
    
    <?php echo form_open("auth/login");?>

    <div id="infoMessage"><?php echo $message;?></div>

    <p class="form-item">
        <?php
            echo form_label('E-mailadres', 'identity');
            echo form_input($identity);
        ?>
    </p>

    <?php echo form_error('identity', '<div class="error">', '</div>'); ?>

    <p class="form-item">
        <?php
            echo form_label('Wachtwoord', 'password');
            echo form_input($password);
        ?>
    </p>

    <?php echo form_error('password', '<div class="error">', '</div>'); ?>

    <!-- <p class="form-item"><a href="auth/forgot_password">Ik ben mijn wachtwoord vergeten</a></p> -->

    <p class="form-footer">
	   <?php 
            echo form_submit($submit);
            echo form_checkbox($remember_checkbox);
            echo form_label('Gegevens onthouden', '', $remember_label);
        ?>
    </p>
     
    <?php echo form_close();?>

    </div>

    <div class="column-right">
        <p class="column-right-title"><strong>Heb je nog geen account?</strong></p>
        <p class="form-footer"><a href="register" class="button button-gradient round">Registreer je nu gratis</a></p>
    </div>

</div>
