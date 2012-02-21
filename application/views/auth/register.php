<div class="content_title">
    <div class="content_title_pattern">
        <div class="content_title_wrapper">
            <img src="resources/img/icon-register.png" alt="icon">
            <h1><?php echo $title; ?></h1>
        </div>  
    </div>
</div>

<div id="main" role="main">

    <div class="content_background">
        <p>Vul hieronder je gegevens in om je te registreren.</p>
            
            <div id="infoMessage"><?php echo $message;?></div>
            
                <?php echo form_open("auth/register");?>

                <p class="form-item">
                    <?php
                        echo form_label('E-mail:', 'email');
                        echo form_input($email);
                    ?>
                </p>

                <?php echo form_error('email', '<div class="error">', '</div>'); ?>

                <p class="form-item">
                    <?php
                        echo form_label('Wachtwoord:', 'password');
                        echo form_input($password);
                    ?>
                </p>

                <?php echo form_error('password', '<div class="error">', '</div>'); ?>

                <p class="form-item">
                    <?php
                        echo form_label('Herhaal wachtwoord:', 'password_confirm');
                        echo form_input($password_confirm);
                    ?>
                </p>

                <?php echo form_error('password_confirm', '<div class="error">', '</div>'); ?>

                <p class="form-footer"><?php echo form_submit('submit', 'Registreer');?></p>

                <?php echo form_close();?>

    </div>

    <div class="right-column">
        <p class="side-header-title">Heb je nog vragen?</p>
        <p class="form-footer"><a href="register" class="button">Contacteer ons</a></p>
    </div>

</div>