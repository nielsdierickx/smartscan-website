<div class="newlist-top">
    
	<input type="search" class="search round" placeholder="Zoeken...">
    
   	<?php if (isset($list)): ?>

   		<?php echo '<a class="basket-top" href="lists/listdetail/' . $list->id . '">'; ?>
		
		<div id="newlist-top-basket">
		
			<?php echo '<p id="list-name">' . $list->name . '</p>'; ?>
    		<?php echo '<p><span>' . $productcount . '</span>' . $totalprice . ' €<p>'; ?>

		</div>

		</a>

	<?php endif; ?>

</div>

<div class="newlist-bottom">
	
	<p class="breadcrumb">

		<?php 	echo '<a href="products'; 

				if (isset($list)) { echo "/index/" . $list->id; }

				echo '">Alle producten</a>'; ?>

		<img class="breadcrumb-bullet" src="resources/img/list-bullet.png" alt="icon"><?php echo $category->name; ?></p>

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
				
				    <?php echo '<input type="text" id="add-amount" name="add-amount" value="1">'; ?>
				    <span class="product-plus"><a href="#" title="Verhoog de hoeveelheid">+</a></span> 
				    <span class="product-minus"><a href="#" title="Verminder de hoeveelheid">-</a></span>
				
				</span>

                <span class="product-add">

                	<?php if (isset($list)) { echo '<input type="hidden" id="add-list-id" name="add-list-id" value="' . $list->id . '">'; } ?>
                    <?php echo '<input type="hidden" id="add-id" name="add-id" value="' . $product->id . '">'; ?>
                    <?php echo '<input type="submit" id="add-button-'. $product->id .'" name="' . $product->name .'" class="button-accent" value="+">'; ?>

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
  
    });

</script>