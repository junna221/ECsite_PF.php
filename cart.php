<?php
require'config.php';
//商品数を更新
$a = ('update cart set  count = :count where customer_id =:customer_id and product_id =:product_id');
  $a = $pdo->prepare($a);
  $i = array(':count' =>$_POST['num'],':customer_id'=>$_SESSION['customer']['id'],':product_id'=>$_POST['id']);
  $a->execute($i);
?>

<?php include('head_foot/header.php');?>

<?php if (!empty($_SESSION['product'])) :?>
  <?php $sql=$pdo->prepare('insert into cart values(?,?,?)');?>
  <?php $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id'],$_POST['num']]);?>

<table>
  <th>商品番号</th><th>商品名</th>
  <th>価格</th><th>個数</th><th>小計</th>

  <?php $sql=$pdo->prepare(
    'select * from cart, product '.'where customer_id=? and product_id=id');
  $sql->execute([$_SESSION['customer']['id']]);?>

  <?php foreach ($sql as $row) :?>
  <?php $id=$row['id'];?>
  <tr>
    <td><?php echo $id ?></td>
    <td><a href="puroduct_deta.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a></td>
    <td><?php echo $row['price'] ?></td>
    <td><?php echo $row['count'] ?> </td>
    <td><?php echo $row['count'] * $row['price'] ?> </td>
    <td><a href="cart-delete.php?id=<?php echo $id ?>">削除</a></td>
  </tr>
</table>
  <?php endforeach; ?>
<?php else :?>
  <p>カートに商品がありません。</p>
<?php endif; ?>
  
<?php include('head_foot/footer.php');?>
