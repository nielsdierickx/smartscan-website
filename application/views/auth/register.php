<div class="content_title">
        <div class="content_title_wrapper">
            <!-- <img src="resources/img/icon-register.png" alt="icon"> -->
            <h1><?php echo $title; ?></h1>
        </div>
</div>

<div id="main" role="main">

    <div class="column-left">
        <p class="form-info">Vul hieronder je gegevens in om je te registreren.</p>
            
            <div id="infoMessage"><?php echo $message;?></div>
            
                <?php echo form_open("auth/register");?>

                <p class="form-item">
                    <?php
                        echo form_label('E-mail', 'email');
                        echo form_input($email);
                    ?>
                </p>

                <?php echo form_error('email', '<div class="error">', '</div>'); ?>

                <p class="form-item">
                    <?php
                        echo form_label('Wachtwoord', 'password');
                        echo form_input($password);
                    ?>
                </p>

                <?php echo form_error('password', '<div class="error">', '</div>'); ?>

                <p class="form-item">
                    <?php
                        echo form_label('Herhaal wachtwoord', 'password_confirm');
                        echo form_input($password_confirm);
                    ?>
                </p>

                <?php echo form_error('password_confirm', '<div class="error">', '</div>'); ?>

                <p class="form-footer"><?php echo form_submit($submit);?></p>

                <?php echo form_close();?>

    </div>

    <div class="column-right">
        <p class="column-right-title">Waarom registreren?</p>
        
        <p class="form-footer">
            <ul class="register-list">
                <li>Voordelen</li>
                <li>Nog een voordeel</li>
                <li>Nog een voordeel</li>
            </ul>
        </p>
        
    </div>

    <!-- <div class="right-second-column">
        <p class="side-header-title">Heb je nog vragen?</p>
        <p class="form-footer"><a href="register" class="button button-gradient round">Contacteer ons</a></p>
    </div> -->

</div>