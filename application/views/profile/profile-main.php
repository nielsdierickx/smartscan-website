<div class="profile-content">

        <img src="resources/img/default_avatar.jpg" alt="avatar">

        <?php 
            echo "username: " . $user->username . "<br/>";
            echo "e-mail adres: " . $user->email . "<br/>";
            echo "naam: " . $user->first_name . " " . $user->last_name . "<br/>";
        ?>

</div>

<ul class="lists-overview">
    <li><a href="">Promotie feed?</a></li>
    <li><a href="">Nu 30% korting op dit product !</a></li>
    <li><a href="">2 Kopen, 1 gratis !</a></li>
</ul>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(2)').addClass('selected');
  
    });

</script>
    

