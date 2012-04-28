<div class="list-header">
    <p><?php echo strtolower($listname) ?></p>
    <a class="button" href="lists">Alle lijstjes</a>
</div>

    <?php if ($products): ?>

	<ul class="products-overview">
	    <?php foreach ($products as $product):?>

	        <?php 

	        	echo '<li><img src="' .$product->photo . '" alt="product-photo" /><p>'
	        	. $product->name . '</p><span>' . $product->price . ' €</span>';

	        	if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; }

	        	echo '	<span class="product-amount">' . $product->amount . '</span>
	        			<span class="product-total-price">' . $product->amount * $product->price .' €</span>

	        			</li>'; 
	        ?>


	    <?php endforeach;?>

	</ul>

	<?php else: ?>

	<p class="products-empty">Er zijn nog geen producten toegevoegd aan deze categorie</p>

	<?php endif;?>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');
  
    });

</script>