<div class="newlist-left-column">
    
    <div id="newlist-header">

	    <!-- <div id="newlist-name">
	        
		        <?php
		            echo form_label('Naam', 'list_name');
		            echo form_input($list_name);
		        ?>

		</div> -->

    <div id="shopping-basket">
    	<a href=""><span>40</span>Winkelmandje</a>
    	<!-- <p id="shopping-basket-price"><a href="">Totaal: €58,50</a></p> -->
	</div>

	</div>

</div>

<div class="newlist-right-column">

	<div class="profile-content-list">
    
    

	<input type="search" class="search round" placeholder="Zoeken...">

	<div id="list-categories">
		
		<ul class="categories-overview">

			<?php

			$i = 1;

			foreach ($categories as $category) 
            {
            	if($i > 3) { $i = 1; }

            	switch($i)
            	{
            		case 1:
            			echo '	<li class="category-left"><a href="">
	            					<figure>
	            						<img src="' . $category->photo . '" alt="' . $category->name . '">
										<figcaption>
											<p>' . $category->name .'</p>			
										</figcaption>
									</figure>
								</a></li>';
            			break;

            		case 2:
            			echo '	<li class="category-middle"><a href="">
	            					<figure>
	            						<img src="' . $category->photo . '" alt="' . $category->name . '">
										<figcaption>
											<p>' . $category->name .'</p>			
										</figcaption>
									</figure>
								</a></li>';
            			break;
            			
            		case 3:
            			echo '	<li class="category-right"><a href="">
	            					<figure>
	            						<img src="' . $category->photo . '" alt="' . $category->name . '">
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

</div>




<script>

    $(document).ready(function(){

    	$('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(1)').addClass('selected');
  
    });

</script>