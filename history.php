<?php

session_start();
require'menu.php';
require'config.php';

?>

<?php include('head_foot/header.php');?>

<?php if (isset($_SESSION['customer'])):?>
  <?php $sql_purchase=$pdo->prepare(
    //購入したお客様情報を新しい順に表示
    'select * from purchase where customer_id=? order by id desc');?>
  <?php $sql_purchase->execute([$_SESSION['customer']['id']]);?>


<?php foreach ($sql_purchase as $row_purchase):?>
  <?php $sql_detail=$pdo->prepare(
    //お客様情報を元に購入履歴から商品データを取得する
    'select * from purchase_detail,product '.
    'where purchase_id=? and product_id=id');?>
  <?php $sql_detail->bindValue(1,$purchase_id);?>
  <?php $sql_detail->execute([$row_purchase['id']])?>
<div class="history-d">
		<?php $total=0;?>
		<?php foreach ($sql_detail as $row_detail):?>
			<img src="image/<?php echo $row_detail['id'] ?>.jpg " height="70" width="100">
		    <p class="history-name"><a><?php echo $row_detail['name']?></a></p>
			<p class="history-price">¥<?php echo $row_detail['price']?>
			購入数：<?php echo $row_detail['count']?></p>
			<?php $subtotal=$row_detail['price']*$row_detail['count'];?>
            <?php $total+=$subtotal;?>
		<?php endforeach; ?>
		<p class="history-total">合計金額：¥<?php echo number_format($total) ?></p>
  </div>
	<?php endforeach; ?>
<?php else: ?>
	<p>購入履歴を表示するには、ログインしてください。</p>
<?php endif; ?>

<?php include('head_foot/header.php');?>