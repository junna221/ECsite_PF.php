<?php include('head_foot/header.php');?>
<?php require 'menu.php'; ?>
<?php require 'config.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	$sql=$pdo->prepare(
		'delete from cart where customer_id=? and product_id=?');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
}
unset($_SESSION['product'][$_REQUEST['id']]);
echo 'カートから商品を削除しました。';
echo '<hr>';
require 'cart.php';
?>
<?php include('head_foot/footer.php');?>
