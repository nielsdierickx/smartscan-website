<div class="newlist-top">
    
	<form action="" method="post">
    <input type="search" id="search-lists" name="search-lists" class="search round" placeholder="Zoeken..." autocomplete="off" value=<?php echo $this->input->post('search-lists') ;?>>
    <input type="submit" value="Zoeken" style="visibility: hidden; display:none;" />
  </form>

	<?php 

   		if (isset($list))
   		{
   			echo '<a class="basket-top" href="lists/listdetail/' . $list->id . '">';
   			echo '<div id="newlist-top-basket">';
		
				echo '<p id="list-name">' . $list->name . '</p>';
    			echo '<p><span>' . $productcount . '</span>' . number_format($totalprice, 2, '.', '') . ' €<p>';

			echo '</div>';
			echo '</a>';
   		}
   		else
   		{
   			echo '<a class="basket-top" href="lists">';
   			echo '<div id="newlist-top-basket">';
		
				echo '<p id="list-name">Geen lijstje geselecteerd</p>';

			echo '</div>';
			echo '</a>';
   		}
	
	?>

</div>

<div class="newlist-bottom">
			
	<ul class="categories-overview">

		<?php

		$i = 1;

		foreach ($categories as $category) 
        {
        	if($i > 3) { $i = 1; }

        	switch($i)
        	{
        		case 1:
        			echo 	'<li class="category-left"><a href="products/category/' . $category->id . '">';


            		echo	'<figure>
            					<img src="' . $category->photo . '" alt="' . $category->name . '" class="round">
								<figcaption>
									<p>' . $category->name .'</p>			
								</figcaption>
							</figure>
							</a></li>';
        			break;

        		case 2:
        			echo 	'<li class="category-middle"><a href="products/category/' . $category->id . '">';

            		echo	'<figure>
            					<img src="' . $category->photo . '" alt="' . $category->name . '" class="round">
								<figcaption>
									<p>' . $category->name .'</p>			
								</figcaption>
							</figure>
							</a></li>';
        			break;

        		case 3:
        			echo 	'<li class="category-right"><a href="products/category/' . $category->id . '">';

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

<script>

    $(document).ready(function(){

    	$('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(2)').addClass('selected');
  
    });

</script>