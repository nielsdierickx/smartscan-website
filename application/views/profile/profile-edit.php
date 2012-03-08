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
    </p>

</div>

<script>

    $(document).ready(function(){

    	$('#side-nav').find('.side-nav-header').removeClass('selected-header');
        $('#side-nav').find('.side-nav-header:eq(0)').addClass('selected-header');

        $('#side-nav').find('a').removeClass('selected');
        $('#side-nav').find('a').removeClass('arrow-selected');
        $('#side-nav').find('a:eq(2)').removeClass('arrow-default');
        $('#side-nav').find('a:eq(2)').addClass('selected');
        $('#side-nav').find('a:eq(2)').addClass('arrow-selected');  	
  
    });

</script>