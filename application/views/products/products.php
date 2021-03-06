<div class="newlist-top">
    
    <form action="" method="post">
    
        <input type="search" id="search-lists" name="search-lists" class="search round" placeholder="Zoeken..." autocomplete="off" value=<?php echo $this->input->post('search-lists') ;?>>
        <input type="submit" value="Zoeken" style="visibility: hidden; display:none;" />
    
    </form>
    
   	<?php 

   		if (isset($list))
   		{
   			echo '<a class="basket-top" href="lists/listdetail/' . $list->id . '">';
   			echo '<div id="newlist-top-basket">';
		
				echo '<p id="list-name">' . $list->name . '</p>';
    			echo '<p><span>' . $productcount . '</span>' . number_format($totalprice, 2, '.', '') . ' €<p>';

			echo '</div>';
			echo '</a>';
   		}
   		else
   		{
   			echo '<a class="basket-top" href="lists">';
   			echo '<div id="newlist-top-basket">';
		
				echo '<p id="list-name">Geen lijstje geselecteerd</p>';

			echo '</div>';
			echo '</a>';
   		}
	
	?>

</div>

<div class="newlist-bottom">
	
	<p class="breadcrumb">

		<?php echo '<a href="products">Alle producten</a>'; ?>

		<img class="breadcrumb-bullet" src="resources/img/list-bullet.png" alt="icon"><?php echo $category->name; ?>

    </p>

    <?php if (isset($feedback)): ?>
        
        <div class="feedback">
            
            <?php echo $feedback; ?>
        
        </div>
    
    <?php endif;?>

    <?php if (isset($promotions) && $promotions != null): ?>

        <ul class="products-overview">
            <?php foreach ($promotions as $product):?>

                <li>

                <?php 

                    echo '<img src="' .$product->photo . '" alt="product-photo" /><p>'
                    . $product->name . '</p><span class="promo-new">' . number_format(($product->price - ($product->price * $product->discount)), 2, '.', '') . ' €</span><span class="promo">PROMO</span><span class="promo-old">' . $product->price . ' €</span>';

                    if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; } 

                ?>

                <?php echo form_open();?>

                    <span class="product-amount">
                    
                        <?php echo '<input type="text" id="add-amount-' . $product->id . '" name="add-amount" value="1">'; ?>
                        <?php echo '<span class="product-plus"><a href="#" id="' . $product->id . '" class="change-amount-plus" title="Verhoog de hoeveelheid">+</a></span>'; ?> 
                        <?php echo '<span class="product-minus"><a href="#" id="' . $product->id . '" class="change-amount-minus" title="Verminder de hoeveelheid">-</a></span>'; ?>
                    
                    </span>

                    <span class="product-add">

                        <?php if (isset($list)) { echo '<input type="hidden" id="add-list-id" name="add-list-id" value="' . $list->id . '">'; } ?>
                        <?php echo '<input type="hidden" id="add-id" name="add-id" value="' . $product->id . '">'; ?>
                        <?php echo '<input type="hidden" id="add-promotion-id" name="add-promotion-id" value="' . $product->promotionid . '">'; ?>
                        <?php 

                            if (isset($list)) 
                            { 
                                echo '<input type="submit" id="add-button-'. $product->id .'" name="' . $product->name .'" class="button-accent" value="+">'; 
                            } 
                            else 
                            {
                                echo '<input type="submit" disabled="disabled" class="button-disabled" value="+">'; 
                            }

                        ?>

                    </span>

                <?php echo form_close();?>

                </li>

            <?php endforeach;?>

        </ul>

    <?php endif; ?>


	<?php if (isset($products)): ?>

	<ul class="products-overview">
	    
        <?php foreach ($products as $product):?>

	    	<li>

	        <?php 

	        	echo '<img src="' .$product->photo . '" alt="product-photo" /><p>'
	        	. $product->name . '</p><span>' . $product->price . ' €</span>';

	        	if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; } 

	        ?>

	        <?php echo form_open();?>

	        	<span class="product-amount">
				
				    <?php echo '<input type="text" id="add-amount-' . $product->id . '" name="add-amount" value="1">'; ?>
				    <?php echo '<span class="product-plus"><a href="#" id="' . $product->id . '" class="change-amount-plus" title="Verhoog de hoeveelheid">+</a></span>'; ?> 
				    <?php echo '<span class="product-minus"><a href="#" id="' . $product->id . '" class="change-amount-minus" title="Verminder de hoeveelheid">-</a></span>'; ?>
				
				</span>

                <span class="product-add">

                	<?php if (isset($list)) { echo '<input type="hidden" id="add-list-id" name="add-list-id" value="' . $list->id . '">'; } ?>
                    <?php echo '<input type="hidden" id="add-id" name="add-id" value="' . $product->id . '">'; ?>
                    <?php 

                    	if (isset($list)) 
                    	{ 
                    		echo '<input type="submit" id="add-button-'. $product->id .'" name="' . $product->name .'" class="button-accent" value="+">'; 
                    	} 
                    	else 
                    	{
                    		echo '<input type="submit" disabled="disabled" class="button-disabled" value="+">'; 
                    	}

                    ?>

                </span>

           	<?php echo form_close();?>

           	</li>

	    <?php endforeach;?>

	</ul>

	<?php endif;?>

</div>


<script>

    $(document).ready(function(){

    	$('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(2)').addClass('selected');

        $("#search-lists").keyup(function(){
            
            var search = $("#search-lists").val();

            $.ajax({
               type: "POST",
               url: "<?php echo $this->uri->uri_string(); ?>",
               data: "search-lists=" + search,
               success: function(html){
                    $('.newlist-bottom').html(html)
               }
            });

            return(false);
        });

        $(".change-amount-plus").click(function(event){
            
            event.preventDefault();
            var id = $(this).attr("id");
          	var value = parseFloat($('#add-amount-'+id).val());
          	$('#add-amount-'+id).val(value+1);        
        });

        $(".change-amount-minus").click(function(event){
            
            event.preventDefault();
            var id = $(this).attr("id");
          	var value = parseFloat($('#add-amount-'+id).val());
          	if(value != 1)
          	{
          		$('#add-amount-'+id).val(value-1); 
          	}          
        });   
    });

</script>