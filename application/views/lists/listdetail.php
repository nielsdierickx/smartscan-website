<div class="list-header">
    <p><?php echo $listname ?></p>
    <a class="button" href="lists">Alle lijstjes</a>
    <a class="button-accent" href="products">Product toevoegen</a>
</div>

    <?php if ($products): ?>

	<ul class="products-overview">

		<?php $total = 0;?>

	    <?php foreach ($products as $product):?>

	        <?php 

	        	echo '<li><img src="' .$product->photo . '" alt="product-photo" /><p>'
	        	. $product->name . '</p><span>' . $product->price . ' €</span>';

	        	if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; }

	        	echo '	<span class="product-total-price">' . $product->amount * $product->price .' €</span>
	        			<span class="product-amount">
						    <input type="text" value="' . $product->amount .'" class="item_quantity">
						    <span class="product-plus"><a href="#" title="Verhoog de hoeveelheid">+</a></span> 
						    <span class="product-minus"><a href="#" title="Verminder de hoeveelheid">-</a></span>
						</span>

	        			<span class="delete"><a href="lists/removeproduct/' . $product->listdetailid . '"><img src="resources/img/icon-delete.png" alt="delete"></a></span>

	        			</li>';

	        	$total += $product->amount * $product->price; 
	        ?>


	    <?php endforeach;?>

	</ul>

	<?php echo '<p class="products-total-price">Totaal: <span>' . $total . ' €</span></p>'; ?>

	<?php else: ?>

	<p class="products-empty">Er zijn nog geen producten toegevoegd aan dit lijstje</p>

	<?php endif;?>

	<div id="dialog-confirm">
        <p>Weet u zeker dat u het product "<span id="listname"></span>" wilt verwijderen?</p>

        <div id="dialog-buttons">
            <a id="removelist" href="" class="button-accent">Ja, verwijderen</a><a href="lists" class="button">Nee, behouden</a>
        </div>
    </div>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');

        // $(".delete a").click(function(event){
        //     event.preventDefault();
        //     var value = $(this).attr("href");

        //     $("#dialog-confirm span").html(value);
        //     $("#dialog-buttons a#removelist").attr("href", "lists/removeproduct/"+value);

        //     $("#dialog-confirm").modal({overlayClose:true});
        //     $("#dialog-confirm").show(); 
        // });
  
    });

</script>