<?php
require 'menu.php';
require 'config.php';
if (isset($_SESSION['customer'])) {
	$sql=$pdo->prepare('insert into favorite values(?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo 'お気に入りに商品を追加しました。';
	echo '<hr>';
	//require 'favorite-out.php';
  echo '<table>';
	echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
	$sql=$pdo->prepare(
		'select * from favorite, product '.
		'where customer_id=? and product_id=id');
	$sql->execute([$_SESSION['customer']['id']]);
	foreach ($sql as $row) {
     $id=$row['id'];
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id='.$id.'">', $row['name'], 
			'</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?id=', $id, 
			'">削除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
    require 'buy.php';
} else {
	echo 'お気に入りに商品を追加するには、ログインしてください。';
}
?>