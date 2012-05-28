
<?php if ($recent_transactions != null): ?>

	<div class="transactions-header">

            <img src="resources/img/list-bullet.png" alt="icon">
            <h3>Deze week</h3><p><?php echo $recent_transaction_totalprice; ?> €</p>

  	</div>
	
	<ul class="lists-overview">

    <?php foreach ($recent_transactions as $transaction): ?> 
        
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

<?php else: ?>

    <div class="transactions-header">

            <img src="resources/img/list-bullet.png" alt="icon">
            <h3>Deze week</h3><p><?php echo $recent_transaction_totalprice; ?> €</p>

    </div>

    <div class="feedback">

        <?php echo $feedback; ?>

    </div>

<?php endif;?>

<?php if (isset($transactions)): ?>

	<br/><br/>
	<div class="transactions-header">

            <img src="resources/img/list-bullet.png" alt="icon">
            <h3>Vroeger</h3><p><?php echo $transaction_totalprice; ?> €</p>
            
  	</div>
	
	<ul class="lists-overview">

    <?php $i=0; ?>

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