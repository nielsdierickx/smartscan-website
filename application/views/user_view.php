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
    
    <?php 
		echo "username: " . $user->username . "<br/>";
		echo "e-mail adres: " . $user->email . "<br/>";
		echo "naam: " . $user->first_name . " " . $user->last_name . "<br/>";
 	?>

    </div>

</div>