<div class="content_title">

  <div class="content_title_pattern">
    <div class="content_title_wrapper">

      <img src="resources/img/lock-icon-big.png" alt="icon">
      <h1>Aanmelden</h1>
    
    </div>  
  </div>

</div>


<div id="main" role="main">
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/login");?>
    	
      <p>
      	<label for="identity">E-mail:</label>
      	<?php echo form_input($identity);?>
      </p>
      
      <p>
      	<label for="password">Wachtwoord:</label>
      	<?php echo form_input($password);?>
      </p>
      
      <p>
	      <?php echo form_checkbox('remember', '1', FALSE);?>
        <label for="remember">Gegevens onthouden</label>
      </p>      
      
      <p><?php echo form_submit('submit', 'Aanmelden');?></p>

      <p>Ik ben mijn wachtwoord vergeten</p>

      
    <?php echo form_close();?>

</div>
