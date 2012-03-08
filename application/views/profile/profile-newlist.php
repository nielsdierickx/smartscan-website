<div class="profile-content-list">
    
    <div id="newlist-header">

    <p id="newlist-name">
        
	        <?php
	            // echo form_label('Naam', 'list_name');
	            echo form_input($list_name);
	        ?>
    </p>

    <div id="shopping-basket"><a href="">Winkelmandje<span>40</span></a>
    	<p id="shopping-basket-price"><a href="">Totaal: €58,50</a></p>

	</div>

</div>

<input type="search" class="search round" placeholder="Zoeken...">

<div id="list-categories">
	
	<ul class="categories-overview">
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	    <li><a href=""></a></li>
	</ul>

</div>

<script>

    $(document).ready(function(){

    	$('#side-nav').find('.side-nav-header').removeClass('selected-header');
        $('#side-nav').find('.side-nav-header:eq(1)').addClass('selected-header');

        $('#side-nav').find('a').removeClass('selected');
        $('#side-nav').find('a').removeClass('arrow-selected');
        $('#side-nav').find('a:eq(5)').removeClass('arrow-default');
        $('#side-nav').find('a:eq(5)').addClass('selected');
        $('#side-nav').find('a:eq(5)').addClass('arrow-selected');  	
  
    });

</script>