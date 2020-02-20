echo '<table>';
	echo '<th>商品番号</th><th>商品名</th>';
	echo '<th>価格</th><th>個数</th><th>小計</th>';
	$sql=$pdo->prepare(
		'select * from cart, product '.
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