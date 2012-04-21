<div class="newlist-left-column">
    
    <div id="newlist-header">
    
    	<p><span>40</span>Items<p>

    	<p id="shopping-basket-price">€58,50</p>

    	<?php
       		//echo form_label('Naam', 'list_name');
      		echo form_input($list_name);
   		?>

    	<a href="#" class="button-accent">Bewaar lijstje</a>

	</div>

</div>

<div class="newlist-right-column">

	<div class="profile-content-list">

	<input type="search" class="search round" placeholder="Zoeken...">

	<div id="list-categories">
		
		<p class="breadcrumb"><a href="lists/newlist">Alle producten</a> &nbsp; > &nbsp; <?php echo $category->name; ?></p>

		<?php if ($products): ?>

		<ul class="lists-overview">
		    <?php foreach ($products as $product):?>

		        <?php echo '<li><a href="">' . $product->name . '</a></li>'; ?>

		    <?php endforeach;?>

		</ul>

		<?php else: ?>
		
		<p class="empty">Er zijn nog geen producten toegevoegd aan deze categorie</p>

		<?php endif;?>



	</div>

</div>




<script>

    $(document).ready(function(){

    	$('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');
  
    });

</script>