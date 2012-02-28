Nieuwe lijst

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