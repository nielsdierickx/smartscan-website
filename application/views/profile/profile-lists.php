<input type="search" class="search round" placeholder="Zoeken...">

<ul class="lists-overview">
    <?php
        
        $i=0;
        foreach ($lists as $list) {
                
            echo '<li><a href="profile/listdetail/' . str_replace(" ", "-", strtolower($list->name)) . '">' . $list->name . '<span>' 
            . $products[$i] . '</span></a></li>';
            
            $i++;   
        }

    ?>

</ul>

<script>

    $(document).ready(function(){

    	$('#side-nav').find('.side-nav-header').removeClass('selected-header');
        $('#side-nav').find('.side-nav-header:eq(1)').addClass('selected-header');

        $('#side-nav').find('a').removeClass('selected');
        $('#side-nav').find('a').removeClass('arrow-selected');
        $('#side-nav').find('a:eq(4)').removeClass('arrow-default');
        $('#side-nav').find('a:eq(4)').addClass('selected');
        $('#side-nav').find('a:eq(4)').addClass('arrow-selected');  	
  
    });

</script>