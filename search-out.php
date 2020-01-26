<?php

require_once('config.php');

try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
} catch (PDOException $e) {
  $msg = $e->getMessage();
}
$sql = $pdo->prepare('select * from product WHERE name collate utf8_unicode_ci like ?');
$sql->execute(['%'.$_POST['keyword'].'%']);
foreach ($sql as $row) {
  echo '<p><img src="image/',$row['id'],'.jpg"></p>';
  echo '<p>',$row['name'],'</p>';
  echo '<p><span>¥</span>',$row['price'],'</p>';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  </body>
</html>