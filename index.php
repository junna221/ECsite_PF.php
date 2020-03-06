<?php
display_errors = On;
php_flag display_errors on;
include('config.php');
//新商品が登録された順に表示するsql
$sql = "select * from product WHERE id <= 200 ORDER BY id desc";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ECサイト ポートフォリオ</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
<link href="js/slick-theme.css" rel="stylesheet" type="text/css">
<link href="js/slick.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
<content>
  <?php include('menu.php');?>
  <p class="new">NEW!新商品</p>
  <ul class="slider">
    <?php foreach ($stmt as $row):?>
      <li><a href="puroduct_deta.php?id=<?php echo $row['id']?>"><img src="image/<?php echo $row['id']?>.jpg" height="200px"></a></li>
    <?php endforeach; ?>
  </ul>
</content>


</body>
</html>
