<p class="list-header"><?php echo strtolower($listname) ?><a href="profile/lists">Alle lijstjes</a></p>

<ul class="lists-overview">
    <?php foreach ($products as $product):?>

        <?php echo '<li><a href="">' . $product->name . '<span>1</span></a></li>'; ?>

    <?php endforeach;?>

</ul>

<script>

    $(document).ready(function(){

    	$('#side-nav').find('.side-nav-header').removeClass('selected-header');
        $('#side-nav').find('.side-nav-header:eq(1)').addClass('selected-header');

        $('#side-nav').find('a').removeClass('selected');
        $('#side-nav').find('a').removeClass('arrow-selected');
        $('#side-nav').find('a:eq(4)').removeClass('arrow-default');
        $('#side-nav').find('a:eq(4)').addClass('selected');
        $('#side-nav').find('a:eq(4)').addClass('arrow-selected');  	
  
    });

</script>