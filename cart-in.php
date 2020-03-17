<?php include 'menu.php';

$id=$_POST['id'];
if($_SESSION['customer']['id']) {
if (!isset($_SESSION['product'])) {
  $_SESSION['product']=[];
}
$count=0;
if (isset($_SESSION['product'][$id])) {
  $count=$_SESSION['product'][$id]['num'];
}
$_SESSION['product'][$id]=[
  'name'=>$_POST['name'], 
  'price'=>$_POST['price'], 
  'num'=>$count+$_POST['num']
];
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require_once 'cart.php';
} else {
  header('location: signUp.php');
  exit();
}
?>