<?php if (isset($feedback)): ?>
    <div class="feedback">
        <?php echo $feedback; ?>
    </div>
<?php endif;?>

<?php if (isset($lists)): ?>

<ul class="lists-overview">

    <?php
    
    $i=0;

    foreach ($lists as $list) 
    {
            
        echo '<li><a href="lists/listdetail/' . str_replace(" ", "-", strtolower($list->name)) . '">' . $list->name . 
                '<span>' . $products[$i] . '</span></a><span class="delete"><a href=""><img src="resources/img/icon-delete.png" alt="delete"></a></span></li>';
        
        $i++;   
    }

    ?>

</ul>


<?php endif;?>