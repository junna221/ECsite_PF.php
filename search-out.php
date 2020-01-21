<?php

require_once('config.php');

try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
} catch (PDOException $e) {
  $msg = $e->getMessage();
}
$sql = $pdo->prepare('select * from customer WHERE name=?');
$sql->execute([$_REQUEST['keyword']]);
foreach ($sql as $row) {

  echo '<p>',$row['name'],'</p>';

}
?>