<?php include('head_foot/header.php');?>
  <p class="account_top">
    <a href="index.php"><img src="image/shop.png"></a>
  </p>
  <div class="account_log">
    <h1>ログイン</h1>
    <form action="account-in.php" method="post">
      <label class="mail">メールアドレス</label><br>
      <input type="mail" name="mail" required><br>
      <label class="pass">パスワード</label><br>
      <input type="password" name="password" required><br>
      <input type="submit" name="login" value="ログイン">
    </form>
  </div>
  <div class="account_new">
    <h2>はじめてご利用の方</h2>
    <p class="account-in"><a href="signUp.php">アカウント作成はこちら</a></p>
  </div>
<?php include('head_foot/footer.php');?>


<?php

include('config.php');

session_start();

if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["mail"])) {  // emptyは値が空のとき
        $errorMessage = 'メールアドレスが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

//POSTのvalidate
if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
  echo '<h1>入力された値が不正です。</h1>';
  //echo '<a href="account-in.php">ログイン</a>';
  return false;
}

//DB内でPOSTされたメールアドレスを検索
try {
  $stmt = $pdo->prepare('select * from customer where mail = ?');
  //$stmt->bindValue(1,$mail);
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
}
?>