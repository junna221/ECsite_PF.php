<?php
include'config.php';
include'menu.php';
//session_start();
?>

<?php include('head_foot/header.php');?>
<?php if(!empty($_SESSION['product'])):?>
<?php require_once'cart.php';?>
<div class="buy">
  <p class="buy-schedule">お届け予定日:<?php echo date("Y/m/d",strtotime("2 day"))?></p>
  <p>お届け先<br>お名前 ：  <?php echo ($_SESSION['customer']['name'])?></p>
  <p>ご住所 ：  <?php echo ($_SESSION['customer']['address'])?></p>
  <p class="buy-goukei">ご請求金額 ：  ¥<?php echo number_format($total) ?></p>
    <a href="purchase.php"><input type="submit" name="" value="注文を確定する"></a>
</div>

<?php else :?>
<p>カートに商品がありません。</p>
<?php endif;?>
<?php include('head_foot/header.php');?>