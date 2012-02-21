<div class="content_title">
    <div class="content_title_pattern">
        <div class="content_title_wrapper">
            <img src="resources/img/icon-lock.png" alt="icon">
            <h1><?php echo $title; ?></h1>
        </div>  
    </div>
</div>

<div id="main" role="main">

    <div class="content_background">
    
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

    <p><a href="auth/forgot_password">Ik ben mijn wachtwoord vergeten</a></p>

    <p class="form-footer">
	   <?php 
            echo form_submit('submit', 'Aanmelden');
            echo form_checkbox($remember_checkbox);
            echo form_label('Gegevens onthouden', '', $remember_label);
        ?>
    </p>
     
    <?php echo form_close();?>

    </div>

    <div class="right-column">
        <p class="side-header-title">Heb je nog geen account?</p>
        <p class="form-footer"><a href="register" class="button">Registreer je nu gratis</a></p>
    </div>

</div>
