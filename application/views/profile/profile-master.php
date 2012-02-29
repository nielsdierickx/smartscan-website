<div class="content_title">
    <div class="content_title_pattern">
        <div class="content_title_wrapper">
            <img src="resources/img/icon-register.png" alt="icon">
            <h1><?php echo $title; ?></h1>
        </div>  
    </div>
</div>

<div id="main" role="main">

    <nav id="side-nav">

        <ul>
            <li class="side-nav-header"><a href="profile">Profiel</a></li>
            <li class="side-nav-link"><a href="profile" class="nav-border arrow-default">Overzicht</a></li>
            <li class="side-nav-link"><a href="profile/edit" class="arrow-default">Bewerken</a></li>
            <li class="side-nav-header"><a href="profile/lists">Lijstjes</a></li>
            <li class="side-nav-link"><a href="profile/lists" class="nav-border arrow-default">Overzicht</a></li>
            <li class="side-nav-link"><a href="profile/newlist" class="arrow-default">Nieuw</a></li>
            <li class="side-nav-header"><a href="profile/transactions">Aankopen</a></li>
            <li class="side-nav-link"><a href="profile/transactions" class="nav-border arrow-default">Overzicht</a></li>
        </ul>

    </nav>

    <div class="content-right-column">
        
        <?php echo $profile_content; ?>
    
    </div>

</div>