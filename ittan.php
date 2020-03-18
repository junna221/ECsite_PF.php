<?php $sql=$pdo->prepare('insert into cart values(?,?,?)');?>
  <?php $sql->execute([$_SESSION['customer']['id'],$_POST['id'],$_POST['num']]);?>
