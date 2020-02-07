<?php
include('cart-in.php');
if(!empty($_SESSION['product'])){
  foreach ($_SESSION['product'] as $id=>$product) {
  echo '<h1>',$product['num'],'</h1>';
  echo '<h1>',$product['name'],'</h1>';
  }
}else {
  echo 'カートに商品がありません';
}
?>