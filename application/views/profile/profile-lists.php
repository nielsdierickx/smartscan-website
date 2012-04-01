<form action="" method="post">
    <input type="search" id="search-lists" name="search-lists" class="search round" placeholder="Zoeken..." autocomplete="off" value=<?php echo $this->input->post('search-lists') ;?>>
    <input type="submit" value="Zoeken" style="visibility: hidden; display:none;" />
</form>

<div id="lists-overview">

    <?php if (isset($feedback)): ?>
        <div class="feedback">
            <?php echo $feedback; ?>
        </div>
    <?php endif;?>



    <?php if (isset($lists)): ?>

    <ul class="lists-overview">

        <?php
        
        $i=0;

        foreach ($lists as $list) 
        {
                
            echo '<li><a href="profile/listdetail/' . str_replace(" ", "-", strtolower($list->name)) . '">' . $list->name . 
            '<span>' . $products[$i] . '</span></a></li>';
            
            $i++;   
        }

        ?>

    </ul>

    
    <?php endif;?>

</div>

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

    $(document).ready(function(){
        
        $("#search-lists").keyup(function(){
            
            var search = $("#search-lists").val();

            $.ajax({
               type: "POST",
               url: "<?php echo site_url('profile/lists'); ?>",
               data: "search-lists="+search,
               success: function(html){
                    $('#lists-overview').html(html)
               }
            });

            return(false);
        });
    });

</script>