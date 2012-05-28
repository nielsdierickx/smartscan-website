<div class="profile-content">

        <img src="resources/img/default_avatar.jpg" alt="avatar">

        <?php 
            echo "username: " . $user->username . "<br/>";
            echo "e-mail adres: " . $user->email . "<br/>";
            echo "naam: " . $user->first_name . " " . $user->last_name . "<br/>";
        ?>

        <a class="button-accent edit-profile" href="profile/edit">Wijzig profiel</a>

</div>

