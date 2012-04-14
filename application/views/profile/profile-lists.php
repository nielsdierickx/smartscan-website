<div class="profile-left-column">

    <!-- <a href="profile/newlist" class="button-accent">Maak nieuwe lijst</a>

    <br/><br/><br/> -->

    <select>
        <option value="sorteer">Sorteer</option>
        <option value="naam">Naam</option>
        <option value="datum">Datum toegevoegd</option>
        <option value="items">Aantal items</option>
    </select>

</div>

<div class="profile-right-column">

    <form action="" method="post">
        <input type="search" id="search-lists" name="search-lists" class="search round" placeholder="Zoeken..." autocomplete="off" value=<?php echo $this->input->post('search-lists') ;?>>
        <input type="submit" value="Zoeken" style="visibility: hidden; display:none;" />
    </form>

    <a href="profile/newlist" class="button-accent newlist">+</a>

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

</div>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');
  
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