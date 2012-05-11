<div class="newlist-top">
    
	<input type="search" class="search round" placeholder="Zoeken...">

	<div id="newlist-top-basket">

		<?php if (isset($list)): ?>

			<?php echo $list->name; ?>

		<?php endif; ?>

    	<!-- <p id="shopping-basket-price">€58,50</p>
    	<p><span>40</span>Items<p> -->

	</div>

</div>

<div class="newlist-bottom">

	<div class="newlist-left-column">

			
		<ul class="categories-overview">

			<?php

			$i = 1;

			foreach ($categories as $category) 
            {
            	if($i > 3) { $i = 1; }

            	switch($i)
            	{
            		case 1:
            			echo 	'<li class="category-left"><a href="products/category/' . $category->id . ''; 
	            				
	            				if (isset($list)) { echo "/" . $list->id; }

						echo '">';


	            		echo	'<figure>
	            					<img src="' . $category->photo . '" alt="' . $category->name . '" class="round">
									<figcaption>
										<p>' . $category->name .'</p>			
									</figcaption>
								</figure>
								</a></li>';
            			break;

            		case 2:
            			echo 	'<li class="category-middle"><a href="products/category/' . $category->id . ''; 
	            				
	            				if (isset($list)) { echo "/" . $list->id; }

						echo '">';


	            		echo	'<figure>
	            					<img src="' . $category->photo . '" alt="' . $category->name . '" class="round">
									<figcaption>
										<p>' . $category->name .'</p>			
									</figcaption>
								</figure>
								</a></li>';
            			break;

            		case 3:
            			echo 	'<li class="category-right"><a href="products/category/' . $category->id . ''; 
	            				
	            				if (isset($list)) { echo "/" . $list->id; }

						echo '">';


	            		echo	'<figure>
	            					<img src="' . $category->photo . '" alt="' . $category->name . '" class="round">
									<figcaption>
										<p>' . $category->name .'</p>			
									</figcaption>
								</figure>
								</a></li>';
            			break;
            	}
                
                $i++;
                 
            }

            ?>

		</ul>

	</div>

	<div class="newlist-right-column">

		<!-- <select>
	        <option value="sorteer">Sorteer</option>
	        <option value="naam">Naam</option>
	        <option value="datum">Datum toegevoegd</option>
	        <option value="items">Aantal items</option>
    	</select> -->

	</div>

</div>

<script>

    $(document).ready(function(){

    	$('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(2)').addClass('selected');
  
    });

</script>