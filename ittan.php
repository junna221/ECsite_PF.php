<?php
include'config.php';

//商品数を更新
$a = ('update cart set  count = :count where customer_id =:customer_id and product_id =:product_id');
  $a = $pdo->prepare($a);
  $i = array(':count' =>$_POST['num'],':customer_id'=>$_SESSION['customer']['id'],':product_id'=>$_POST['id']);
  //$a->bindValue(':count',$count);
  //$a->bindValue(':customer_id',$customer_id);
  //$a->bindValue('::product_id',$product_id);
  $a->execute($i);
?>