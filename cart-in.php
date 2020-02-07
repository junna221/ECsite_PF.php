<?php
include('menu.php');
$id = $_POST['id'];
//変数を定義されているか調べる
if (!isset($_SESSION['product'])){
  $_SESSION['product'] =[];
}
//カートに入っている個数を取得
$num = 0;
if (isset($_SESSION['product'][$id])) {
  $num=$_SESSION['product'][$id]['num'];
}
//カートに商品を登録
$_SESSION['product'][$id] = [
  'num' => $num+$_POST['num'],
  'name' => $_POST['name']
];
echo '<p>追加されました</p>';
header('Location: http://localhost:8888/ECsite_PF.php/cart-out.php');
?>


