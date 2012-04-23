<div class="content_title">
        <div class="content_title_wrapper">
            <img src="resources/img/list-bullet.png" alt="icon">
            <h1><?php echo $title; ?></h1>

            <nav id="profile-nav">
            
                <ul>
                    <li><a href="transactions"><img src="resources/img/icon-transactions.png"/>Aankopen</a></li>
                    <li><a href="lists"><img src="resources/img/icon-list.png"/>Lijstjes</a></li>
                    <li><a href="profile"><img src="resources/img/icon-user.png"/>Profiel</a></li>
                </ul>

            </nav>
        </div>
      
</div>

<div id="main-profile" role="main">

    <?php echo $content; ?>

</div>