<?php

include('config.php');
include('index.php');

try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
} catch (PDOException $e) {
  $msg = $e->getMessage();
}
$sql = $pdo->prepare('select * from product WHERE name collate utf8_unicode_ci like ?');
$sql->execute(['%'.$_POST['keyword'].'%']);
?>


<?php include('../header.php');?>
<div class="search-inp">
  <?php foreach ($sql->fetchAll() as $row):?>
    <img src="image/<?php echo $row['id']?>.jpg"  width="300" height="200">
    <p><?php echo $row['name']?></p>
    <p>¥<?php echo $row['price']?></p>
  <?php endforeach; ?>
</div>
<?php include('../footer.php');?>
