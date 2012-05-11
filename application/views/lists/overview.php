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

            <?php $i=0; ?>

            <?php foreach ($lists as $list): ?> 
                
                <li>

                <?php echo '<a href="lists/listdetail/' . $list->id . '">' . $list->name . '<span class="productcount">' . $products[$i] . '</span></a>'; ?>


                <?php echo form_open();?>

                <span class="delete">

                    <?php echo '<input type="hidden" id="delete-id" name="delete-id" value="' . $list->id . '">'; ?>
                    <?php echo '<input type="submit" id="delete-button-'. $list->id .'" name="' . $list->name .'" class="delete-button" value="">'; ?>

                </span>

                <?php echo form_close();?>

                </li>    
                
                <?php $i++; ?>

            <?php endforeach;?>

        </ul>

        <?php endif;?>

    </div>

    <div id="dialog-confirm">

        <p>Weet u zeker dat u het lijstje "<span id="listname"></span>" wilt verwijderen?</p>

        <div id="dialog-buttons">

            <?php echo form_open();?>

                <input type="hidden" id="delete-id" name="delete-id" value="">
                <input type="submit" class="button-accent" value="Verwijderen">

                <a href="lists" class="button">Behouden</a>

            <?php echo form_close();?>

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
               data: "search-lists=" + search,
               success: function(html){
                    $('#lists-overview').html(html)
               }
            });

            return(false);
        });

        $(".delete-button").click(function(){
            
            var delete_id = $(this).attr("id").match(/[\d]+$/);
            var list_name = $(this).attr("name");

            $("#dialog-confirm span#listname").html(list_name);
            $("#dialog-buttons #delete-id").attr("value", delete_id);

            $("#dialog-confirm").modal({overlayClose:true});
            $("#dialog-confirm").show(); 

            return(false);
            
        });
    });

</script>