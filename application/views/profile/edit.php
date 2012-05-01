<div class="profile-content">

    	<p class="form-item-profile">
        
	        <?php
	            echo form_label('Voornaam', 'first_name');
	            echo form_input($first_name);
	        ?>
    	</p>

    	<?php echo form_error('first_name', '<div class="error">', '</div>'); ?>

    	<p class="form-item-profile">
        
	        <?php
	            echo form_label('Achternaam', 'last_name');
	            echo form_input($last_name);
	        ?>
    	</p>

    	<?php echo form_error('last_name', '<div class="error">', '</div>'); ?>

    	<p class="form-footer">
		   <?php 
	            echo form_submit($submit);
	        ?>

            <a class="button edit-cancel" href="profile">Annuleer</a>
    </p>

</div>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(3)').addClass('selected');
  
    });

</script>