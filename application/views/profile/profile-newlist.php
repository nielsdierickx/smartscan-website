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
	            						<img src="' . $category->photo . '" alt="' . $category->name . '" class="round">
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