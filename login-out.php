<?php

include('config.php');

session_start();
//POSTのvalidate
if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  echo '<a href="account-in.php">ログイン</a>';
  return false;
}
//DB内でPOSTされたメールアドレスを検索
try {
  $stmt = $pdo->prepare('select * from customer where mail = ?');
  $stmt->bindvalue(1,$mail);
  $stmt->execute([$_POST['mail']]);
  //$row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}

foreach ($stmt as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'], 'name'=>$row['name'], 
		'address'=>$row['address']];
}

//mailがDB内に存在しているか確認
if (!isset($row['mail'])) {
  echo 'メールアドレス又はパスワードが間違っています。';
  return false;
}
//パスワード確認後sessionにメールアドレスを渡す
if (password_verify($_POST['password'], $row['password'])) {
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION['mail'] = $row['mail'];
  //header('Location: https://shopping-site-php.herokuapp.com/');
  //exit();
  header('Location: http://localhost:8888/ECsite_PF.php');
  //exit();
} else {
  echo 'メールアドレス又はパスワードが間違っています。';
  return false;
}
?>