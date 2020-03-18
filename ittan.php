<?php $sql=$pdo->prepare('insert into cart values(?,?,?)');?>
  <?php $sql->execute([$_SESSION['customer']['id'],$_REQUEST['id'],$_POST['num']]);?>
