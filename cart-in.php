<?php
include 'menu.php';
include 'config.php';

$id=$_POST['id'];
//カート変数が未定義の時カートをからの状態に初期化
if($_SESSION['customer']['id']) {
if (!isset($_SESSION['product'])) {
  $_SESSION['product']=[];
}
//カートに入ってる個数を取得
$count=0;
if (isset($_SESSION['product'][$id])) {
  $count=$_SESSION['product'][$id]['num'];
}
//カートに商品を登録する
$_SESSION['product'][$id]=[
  'name'=>$_POST['name'], 
  'price'=>$_POST['price'], 
  'num'=>$count+$_POST['num']
];
//商品数を更新
$a = ('update cart set  count = :count where customer_id =:customer_id and product_id =:product_id');
  $a = $pdo->prepare($a);
  $i = array(':count' =>$_POST['num'],':customer_id'=>$_SESSION['customer']['id'],':product_id'=>$_POST['id']);
  //$a->bindValue(':count',$count);
  //$a->bindValue(':customer_id',$customer_id);
  //$a->bindValue('::product_id',$product_id);
  $a->execute($i);
  echo '<p>カートに商品を追加しました。</p>';
$sql=$pdo->prepare('insert into cart values(?,?,?)');
  $sql->execute([$_SESSION['customer']['id'],$_POST['id'],$_POST['num']]);
echo '<hr>';
include 'cart.php';
} else {
  header('location: signUp.php');
  exit();
}
?>