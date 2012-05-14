<div class="list-header">

    <p><?php echo $list->name ?></p>
    <a class="button" href="lists">Alle lijstjes</a>
    <?php echo '<a class="button-accent" href="products/index/' . $list->id . '">Product toevoegen</a>'; ?>

</div>


<?php if ($products): ?>

<ul class="products-overview">

	<?php $total = 0;?>

    <?php foreach ($products as $product):?>

    	<li>

        <?php 

        	echo '<img src="' .$product->photo . '" alt="product-photo" /><p>' . $product->name . '</p><span>' . $product->price . ' €</span>';

        	if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; }

        	echo '<span class="product-total-price">' . $product->amount * $product->price .' €</span>';

     	?>

     	<?php echo form_open();?>

     		<span class="product-amount">

			    <?php echo '<input type="text" value="' . $product->amount . '">'; ?>
			    
                <span class="product-plus"><?php echo '<input type="submit" name="submit" value="+">'; ?></span>
                <span class="product-minus"><?php echo '<input type="submit" name="submit" value="-">'; ?></span>

			    <!-- <span class="product-plus"><a href="#" title="Verhoog de hoeveelheid">+</a></span> 
			    <span class="product-minus"><a href="#" title="Verminder de hoeveelheid">-</a></span> -->

			</span>

			<span class="delete">

				<?php echo '<input type="hidden" id="delete-id" name="delete-id" value="' . $product->listdetailid . '">'; ?>
        		<?php echo '<input type="submit" id="delete-button-' . $product->listdetailid . '" name="submit" class="delete-button" value="Verwijderen">'; ?>

        	</span>

     	<?php echo form_close();?>

        </li>		

        <?php $total += $product->amount * $product->price; ?>

    <?php endforeach;?>

</ul>

<?php echo '<p class="products-total-price">Totaal: <span>' . $total . ' €</span></p>'; ?>

<?php else: ?>

<p class="products-empty">Er zijn nog geen producten toegevoegd aan dit lijstje</p>

<?php endif;?>

<div id="dialog-confirm">

        <p>Weet u zeker dat u het product <!-- "<span id="productname"></span>" --> wilt verwijderen?</p>

        <div id="dialog-buttons">

            <?php echo form_open();?>

                <input type="hidden" id="delete-id" name="delete-id" value="">
                <input type="submit" name="submit" class="button-accent" value="Verwijderen">

                <?php echo '<a href="lists/listdetail/' . $list->id . '" class="button">Behouden</a>'; ?>

            <?php echo form_close();?>

        </div>
        
    </div>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');

        $(".delete-button").click(function(){
            
            var delete_id = $(this).attr("id").match(/[\d]+$/);
            var list_name = $(this).attr("name");

            $("#dialog-confirm span#productname").html(list_name);
            $("#dialog-buttons #delete-id").attr("value", delete_id);

            $("#dialog-confirm").modal({overlayClose:true});
            $("#dialog-confirm").show(); 

            return(false);
            
        });
    });

</script>