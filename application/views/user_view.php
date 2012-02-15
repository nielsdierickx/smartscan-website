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
    
    <?php 
		if(isset($user) && $username == $profile_name) 
		{ 
			echo "username: " . $user->username . "<br/>";
			echo "e-mail adres: " . $user->email . "<br/>";
			echo "naam: " . $user->first_name . " " . $user->last_name . "<br/>";

		}
		else { echo $profile_name;}
 	?>

    </div>

</div>