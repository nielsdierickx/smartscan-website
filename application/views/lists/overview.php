<div class="profile-left-column">

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

    <a href="lists/newlist" class="button-accent newlist-button">+</a>

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
                    
                echo '<li><a href="lists/listdetail/' . $list->id . '">' . $list->name . 
                '<span class="productcount">' . $products[$i] . '</span></a><span class="delete"><a href="'.$list->name.'"><img src="resources/img/icon-delete.png" alt="delete"></a></span></li>';
                
                $i++;   
            }

            ?>

        </ul>

        
        <?php endif;?>

    </div>

    <div id="dialog-confirm">
        <p>Weet u zeker dat u het lijstje "<span id="listname"></span>" wilt verwijderen?</p>

        <div id="dialog-buttons">
            <a id="removelist" href="" class="button-accent">Ja, verwijderen</a><a href="lists" class="button">Nee, behouden</a>
        </div>
    </div>

</div>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');
        
        $("#search-lists").keyup(function(){
            
            var search = $("#search-lists").val();

            $.ajax({
               type: "POST",
               url: "<?php echo site_url('lists'); ?>",
               data: "search-lists="+search,
               success: function(html){
                    $('#lists-overview').html(html)
               }
            });

            return(false);
        });

        $(".delete a").click(function(event){
            event.preventDefault();
            var value = $(this).attr("href");

            $("#dialog-confirm span").html(value);
            $("#dialog-buttons a#removelist").attr("href", "lists/removelist/"+value);

            $("#dialog-confirm").modal({overlayClose:true});
            $("#dialog-confirm").show(); 
        });
    });

</script>