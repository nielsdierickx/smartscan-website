<div class="list-header">

    <p><?php echo $list->name; ?></p>
    <a class="button" href="lists">Alle lijstjes</a>

    <?php echo form_open(); ?>

        <?php echo '<input type="hidden" id="list-id" name="list-id" value="' . $list->id . '">'; ?>
        <?php echo '<input type="submit" name="submit" class="button-accent" value="Producten toevoegen">'; ?>

    <?php echo form_close(); ?>

</div>

<?php $total = 0;?>

<?php if ($products): ?>

<ul class="products-overview">	

    <?php foreach ($products as $product):?>

    	<li>

        <?php 
                
        	echo '<img src="' .$product->photo . '" alt="product-photo" /><p>' . $product->name . '</p>';

            if($product->discount)
            {
                echo '<span class="promo">PROMO</span><span class="promo-new">' . number_format(($product->price - ($product->price * $product->discount)), 2, '.', '') . ' €</span><span class="promo-old">' . $product->price . ' €</span>';
            }
            else
            {
                echo '<span>' . $product->price . ' €</span>';
            }

        	if($product->price_amount != null) { echo '<span class="product-price-amount">' . $product->price_amount . ' €/kg</span>'; }

        	echo '<span class="product-total-price">' . $product->amount * $product->price .' €</span>';

     	?>

     	<?php echo form_open();?>

     		<span class="product-amount">

			    <?php echo '<input type="text" value="' . $product->amount . '">'; ?>
			    
                <span class="product-plus"><?php echo '<input type="submit" name="submit" value="+">'; ?></span>
                <span class="product-minus"><?php echo '<input type="submit" name="submit" class="amount-minus" value="-">'; ?></span>

			</span>

			<span class="delete">

				<?php echo '<input type="hidden" id="delete-id" name="delete-id" value="' . $product->listdetailid . '">'; ?>
        		<?php echo '<input type="submit" id="' . $product->name .'-' . $product->listdetailid . '" name="submit" class="delete-button" value="Verwijderen">'; ?>

        	</span>

     	<?php echo form_close();?>

        </li>		

        <?php 

        if($product->discount)
        {
            $total += $product->amount * ($product->price - ($product->price * $product->discount));
        }
        else
        {
            $total += $product->amount * $product->price; 
        }
        
        ?>

    <?php endforeach;?>

</ul>

<?php echo '<p class="products-total-price">Totaal: <span>' . number_format($total, 2, '.', '') . ' €</span></p>'; ?>

<?php else: ?>

<p class="products-empty">Er zijn nog geen producten toegevoegd aan dit lijstje</p>

<?php endif;?>

<div id="dialog-confirm">

        <p>Weet u zeker dat u het product "<span id="productname"></span>" wilt verwijderen?</p>

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
            var id = $(this).attr("id");

            var product_name = id.split('-');

            $("#dialog-confirm span#productname").html(product_name[0]);
            $("#dialog-buttons #delete-id").attr("value", delete_id);

            $("#dialog-confirm").modal({overlayClose:true});
            $("#dialog-confirm").show(); 

            return(false);
            
        });
    });

</script>