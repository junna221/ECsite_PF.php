<?php

include('config.php');
include('menu.php');

try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
} catch (PDOException $e) {
  $msg = $e->getMessage();
}
$sql = $pdo->prepare('select * from product WHERE name collate utf8_unicode_ci like ?');
$sql->execute(['%'.$_POST['keyword'].'%']);

?>


<?php include('head_foot/header.php');?>

<?php foreach ($sql->fetchAll() as $row):?>
  <section class="section01">
    <ul class="sea_ul">
      <li>
        <a href="puroduct_deta.php?id=<?php echo $row['id']?>">
          <img src="image/<?php echo $row['id']?>.jpg" height="150">
          <p><?php echo $row['name']?></p>
          <p>¥<?php echo number_format($row['price'])?></p>
        </a>
      </li>
    </ul>
  </section>
  <?php endforeach; ?>

<?php include('head_foot/footer.php');?>
