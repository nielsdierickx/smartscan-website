<input type="search" class="search round" placeholder="Zoeken...">

<ul class="lists-overview">
	<li><a href="">BBQ<span>20</span></a></li>
	<li><a href="">Voor de bomma<span>6</span></a></li>
	<li><a href="">Jeroen Meus<span>12</span></a></li>
	<li><a href="">Maandag<span>9</span></a></li>
	<li><a href="">Feestje<span>40</span></a></li>
    <li><a href="">BBQ<span>20</span></a></li>
    <li><a href="">Voor de bomma<span>6</span></a></li>
    <li><a href="">Jeroen Meus<span>12</span></a></li>
    <li><a href="">Maandag<span>9</span></a></li>
    <li><a href="">Feestje<span>40</span></a></li>
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