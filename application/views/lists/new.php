<div class="profile-content">

    <?php echo form_open('lists/newlist') ?>

    	<p class="form-item-newlist">
        
	        <?php
	            echo form_label('Naam', 'list_name');
	            echo form_input($list_name);
	        ?>
    	</p>

    	<?php echo form_error('list_name', '<div class="error">', '</div>'); ?>

    	<p class="form-footer">
		   <?php 
	            echo form_submit($submit);
	        ?>

            <a class="button edit-cancel" href="lists">Annuleer</a>
    </p>

    <?php echo form_close() ?>

</div>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');
  
    });

</script>