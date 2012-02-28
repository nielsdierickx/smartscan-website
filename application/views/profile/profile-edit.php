Profiel aanpassen

<script>

    $(document).ready(function(){

    	$('#side-nav').find('.side-nav-header').removeClass('selected-header');
        $('#side-nav').find('.side-nav-header:eq(0)').addClass('selected-header');

        $('#side-nav').find('a').removeClass('selected');
        $('#side-nav').find('a').removeClass('arrow-selected');
        $('#side-nav').find('a:eq(2)').removeClass('arrow-default');
        $('#side-nav').find('a:eq(2)').addClass('selected');
        $('#side-nav').find('a:eq(2)').addClass('arrow-selected');  	
  
    });

</script>