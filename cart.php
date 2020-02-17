<?php
require'config.php';
//商品数を更新
      $a = ('update favorite set  count = :count where customer_id =:customer_id and product_id =:product_id');
      $a = $pdo->prepare($a);
      $i = array(':count' =>$_POST['num'],':customer_id'=>$_SESSION['customer']['id'],':product_id'=>$_POST['id']);
      $a->execute($i);

if (!empty($_SESSION['product'])) {
    $sql=$pdo->prepare('insert into favorite values(?,?,?)');
	 $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id'],$_POST['num']]);
	echo '<table>';
	echo '<th>商品番号</th><th>商品名</th>';
	echo '<th>価格</th><th>個数</th><th>小計</th>';
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
        echo '<td>',$row['price'], '</td>';
        echo '<td>',$row['count'], '</td>';
		echo '<td><a href="cart-delete.php?id=', $id, 
			'">削除</a></td>';
		echo '</tr>';
    }
}else {
	echo 'カートに商品がありません。';
}
?>

<!--select product_id, sum(count) from favorite group by product_id;-->
<!--update favorite set  count = '5'  where customer_id = '14';-->