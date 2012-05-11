<?php if (isset($feedback)): ?>
    <div class="feedback">
        <?php echo $feedback; ?>
    </div>
<?php endif;?>

<?php if (isset($lists)): ?>

<ul class="lists-overview">

    <?php $i=0; ?>

    <?php foreach ($lists as $list): ?> 
        
        <li>

        <?php echo '<a href="lists/listdetail/' . $list->id . '">' . $list->name . '<span class="productcount">' . $products[$i] . '</span></a>'; ?>


        <?php echo form_open();?>

        <span class="delete">

            <?php echo '<input type="hidden" id="delete-id" name="delete-id" value="' . $list->id . '">'; ?>
            <?php echo '<input type="submit" id="delete-button" name="delete-button" class="delete-button" value="">'; ?>

        </span>

        <?php echo form_close();?>

        </li>    
        
        <?php $i++; ?>

    <?php endforeach;?>

</ul>

<?php endif;?>