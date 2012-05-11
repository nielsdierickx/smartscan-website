<div class="newlist-top">
    
	<input type="search" class="search round" placeholder="Zoeken...">

	<div id="newlist-top-basket">
    
    	<?php if (isset($list)): ?>

			<?php echo $list->name; ?>

		<?php endif; ?>
    	
    	<!-- <p><span>40</span>Items<p>
    	<p id="shopping-basket-price">€58,50</p> -->

	</div>

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

	        <?php 

	        	echo '<li><img src="' .$product->photo . '" alt="product-photo" /><p>'
	        	. $product->name . '</p><span>' . $product->price . ' €</span>';

	        	if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; }

	        	echo '	<span class="addSomeProd">
						    <input type="text" value="1" class="item_quantity">
						    <span class="oneMore item_plus"><a href="#" title="Verhoog de hoeveelheid">+</a></span> 
						    <span class="oneLess item_minus"><a href="#" title="Verminder de hoeveelheid">-</a></span>
						</span>

	        			<a href="" class="button-accent">+</a></li>'; 
	        ?>


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