<div class="content_title">
    <div class="content_title_pattern">
        <div class="content_title_wrapper">
            <img src="resources/img/icon-register.png" alt="icon">
            <h1><?php echo $title; ?></h1>
        </div>  
    </div>
</div>

<div id="main" role="main">

    <section class="ac-container">
        <div>
            <input id="ac-1" name="accordion-1" type="radio" checked />
            <label for="ac-1" id="load_profile">Profiel</label>
            <article class="ac-two-lines">
                <a href="profile/load_profile" class="selected">Overzicht</a>
                <a href="profile/load_profile_edit">Bewerken</a>
            </article>
        </div>
        <div>
            <input id="ac-2" name="accordion-1" type="radio" />
            <label for="ac-2" id="lists">Lijstjes</label>
            <article class="ac-two-lines">
                <a href="profile/lists" id="list-overzicht">Overzicht</a>
                <a href="profile/list_new">Nieuw</a>
            </article>
        </div>
        <div>
            <input id="ac-3" name="accordion-1" type="radio" />
            <label for="ac-3" class="ac-label-last">Aankopen</label>
            <article class="ac-one-line">
                <a href="profile/aankopen">Overzicht</a>
            </article>
        </div>
    </section>

    <div class="content-right-column" id="response">

        <?php echo $this->load->view('profile/profile-main'); ?>

    </div>

</div>

<script>
    $(document).ready(function(){

        var div = $('div#response');

        $('.ac-container').find('a').on('click', function(e) {
            var href = $(this).attr('href');

            div.load(href);
            $('a').removeClass('selected');
            $(this).addClass('selected');

            e.preventDefault();
        });

        $('.ac-container').find('label').on('click', function() {
            var href = $(this).attr('id');

            div.load('profile/' + href);
            $('a').removeClass('selected');

            // TODO: Eerste link class selected maken
            $(this).closest('div').next().find('article a:first').addClass('selected');

        });
    });
</script>