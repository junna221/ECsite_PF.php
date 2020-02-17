<?php
require'config.php';
if (!empty($_SESSION['product'])) {
   $sql=$pdo->prepare('insert into favorite values(?,?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id'],$_POST['num']]);
	echo '<table>';
	echo '<th>商品番号</th><th>商品名</th>';
	echo '<th>価格</th><th>個数</th><th>小計</th>';
	$total=0;
	foreach ($_SESSION['product'] as $id=>$product) {
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id=', $id, '">', 
			$product['name'], '</a></td>';
		echo '<td>', $product['price'], '</td>';
		echo '<td>', $product['num'], '</td>';
		$subtotal=$product['price']*$product['num'];
		$total+=$subtotal;
		echo '<td>', $subtotal, '</td>';
		echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';
    }
	echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, 
		'</td><td></td></tr>';
	echo '</table>';
} else {
	echo 'カートに商品がありません。';
}
?>



require'config.php';
$id = $_POST['id'];
$count = 0;
if (isset($_SESSION['product'][$id])) {
  $count=$_SESSION['product'][$id]['num'];
}

if (isset($_SESSION['product'][$id]))
$count=$_SESSION['product'][$id]['num'];
if (!empty($_SESSION['product'])) {
   $sql=$pdo->prepare('insert into favorite values(?,?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id'],$_POST['num']]);
	echo '<table>';
	echo '<th>商品番号</th><th>商品名</th>';
	echo '<th>価格</th><th>個数</th><th>小計</th>';
	$total=0;
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
        echo '<td>',$count, '</td>';
        echo '<td>',$count*$row['price'], '</td>';
		echo '<td><a href="cart-delete.php?id=', $id, 
			'">削除</a></td>';
		echo '</tr>';
	}
}else {
	echo 'カートに商品がありません。';
}
      
      
      $a = 'select customer_id,product_id, sum(count) from favorite group by customer_id,product_id';
      $i = $pdo->query($a)->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
      var_dump($i);
      
      
      $a = ('update favorite set  count = :count  where customer_id = :customer_id');
$a = $pdo->prepare($a);
      $i = array(':count' =>$_POST['num'],':customer_id'=>$_SESSION['customer']['id']);
      $a->execute($i);
 echo '更新';