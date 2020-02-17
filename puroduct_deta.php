<?php
include('config.php');
$sql = $pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);
?>

<?php include('head_foot/header.php');?>

<?php foreach ($sql as $row):?>
<form action="cart-in.php" method="post">
  <section>
    <ul>
      <li>
          <img src="image/<?php echo $row['id']?>.jpg" >
          <p><?php echo $row['name']?></p>
          <p>¥<?php echo $row['price']?></p>
      </li>
    </ul>
  </section>
<!--商品購入数の選択-->
<select name="num">
<?php for ($i = 1; $i <=10; $i++):?>
<option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php endfor;?>
</select>
<!--カートに追加-->
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<input type="hidden" name="name" value="<?php echo $row['name'];?>">
<input type="hidden" name="price" value="<?php echo $row['price'];?>">
<input type="submit" name="submit" value="カートに追加">
</form>
<?php endforeach; ?>
<?php include('head_foot/footer.php');?>