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

    	$('#side-nav').find('.side-nav-header').removeClass('selected-header');
        $('#side-nav').find('.side-nav-header:eq(0)').addClass('selected-header');

        $('#side-nav').find('a').removeClass('selected');
        $('#side-nav').find('a').removeClass('arrow-selected');
        $('#side-nav').find('a:eq(1)').removeClass('arrow-default');
        $('#side-nav').find('a:eq(1)').addClass('selected');
        $('#side-nav').find('a:eq(1)').addClass('arrow-selected');  	
  
    });

</script>
    

