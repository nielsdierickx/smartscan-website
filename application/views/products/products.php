<div class="newlist-top">
    
	<input type="search" class="search round" placeholder="Zoeken...">
    
   	<?php 

   		if (isset($list))
   		{
   			echo '<a class="basket-top" href="lists/listdetail/' . $list->id . '">';
   			echo '<div id="newlist-top-basket">';
		
				echo '<p id="list-name">' . $list->name . '</p>';
    			echo '<p><span>' . $productcount . '</span>' . $totalprice . ' €<p>';

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

		<?php 	echo '<a href="products">Alle producten</a>'; ?>

		<img class="breadcrumb-bullet" src="resources/img/list-bullet.png" alt="icon"><?php echo $category->name; ?>

    </p>


    <?php if ($promotions): ?>

    <ul class="products-overview">
        <?php foreach ($promotions as $product):?>

            <li>

            <?php 

                echo '<img src="' .$product->photo . '" alt="product-photo" /><p>'
                . $product->name . '</p><span class="promo">PROMO</span><span class="promo-new">' . ($product->price - ($product->price * $product->discount)) . ' €</span><span class="promo-old">' . $product->price . ' €</span>';

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


	<?php if ($products): ?>

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

	<?php else: ?>

	<p class="products-empty">Er zijn nog geen producten toegevoegd aan deze categorie</p>

	<?php endif;?>

</div>


<script>

    $(document).ready(function(){

    	$('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(2)').addClass('selected');

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