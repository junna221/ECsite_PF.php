<?php
include'config.php';
?>

<?php include('head_foot/header.php');?>


<?php if (!empty($_SESSION['product'])) :?>
  <?php $sql=$pdo->prepare('insert into cart values(?,?,?)');?>
  <?php $sql->execute([$_SESSION['customer']['id'],$_REQUEST['id'],$_POST['num']]);?>

  <?php $sql=$pdo->prepare(
    'select * from cart, product '.'where customer_id=? and product_id=id');
  //$sql->bindValue(1, $customer_id);
  $sql->execute([$_SESSION['customer']['id']]);?>
<?php $total=0;?>
  <?php foreach ($sql as $row) :?>
<table class="cart-t">
  <?php $id=$row['id'];?>
  <tr class="cart-out">
    <td class="cart-img"><img src="image/<?php echo $id ?>.jpg " height="180" width="260"></td>
    <td class="cart-name"><a href="puroduct_deta.php?id=<?php echo $id ?>"><?php echo $row['name'] ?></a></td>
    <td class="cart-price">¥<?php echo htmlentities($row['price'], ENT_QUOTES, 'UTF-8') ?></td>
    <td class="cart-count"><?php echo htmlentities($row['count'], ENT_QUOTES, 'UTF-8') ?>点 </td>
    <?php $subtotal = $row['count'] * $row['price'] ?>
    <?php $total+=$subtotal ?>
    <td class="cart-subtotal">小計:￥<?php echo number_format($subtotal) ?> </td>
    <td><a href="cart-delete.php?id=<?php echo $id ?>">削除</a></td>
  </tr>
</table>
  <?php endforeach; ?>
  <p class="cart-goukei">合計: ¥<?php echo number_format($total) ?></p>
<?php else :?>
  <p>カートに商品がありません。</p>
<?php endif; ?>
  
<?php include('head_foot/footer.php');?>
