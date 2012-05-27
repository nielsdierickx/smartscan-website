
<div class="list-header">

    <p><?php echo date("d-m-Y", strtotime($transaction->date)); ?></p>

    <a class="button" href="transactions">Alle Aankopen</a>

</div>

<ul class="products-overview">

    <li>

        <?php 

            echo '<img src="' .$transaction->photo . '" alt="product-photo" />';
            echo '<p>' . $transaction->name . '</p>';

            if($transaction->promotion_id != null) 
            { 
                echo '<span class="promo">PROMO</span><span class="promo-new">' . ($transaction->price - ($transaction->price * $transaction->discount)) . ' €</span>
                <span class="promo-old">' . $transaction->price . ' €</span>'; 
            }
            else 
            {
                echo '<span>' . $transaction->total_price / $transaction->amount . ' €</span>';
            } 


            if($transaction->price_amount != null) { echo '<span class="product-price-amount">' . $transaction->price_amount . ' €/kg</span>'; } 

        ?>

    </li>

</ul>

<?php if ($transactions): ?>

    <br/><br/>
    <div class="transactions-header">

            <img src="resources/img/list-bullet.png" alt="icon">
            <h3>Alle</h3><p><?php echo $transactions_total; ?> €</p>
            
    </div>
    
    <ul class="lists-overview">

    <?php foreach ($transactions as $transaction): ?> 
        
        <li>

        <?php 

            echo '<a href="transactions/detail/' . $transaction->transactionid . '">' . $transaction->name . '<span class="productcount">' . $transaction->amount . '</span>';
            echo '<span class="transaction-price">' . $transaction->total_price . ' €</span>';
            if($transaction->promotion_id != null) { echo '<span class="transaction-promo">PROMO</span>'; }  
            echo '</a>';
        ?>

        </li>

    <?php endforeach;?>

    </ul>

<?php endif;?>

<script>

    $(document).ready(function(){

        $('#profile-nav').find('a').removeClass('selected');
        $('#profile-nav').find('a:eq(0)').addClass('selected');
  
    });

</script>