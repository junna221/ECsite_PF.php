<?php include('../header.php');?>
  <h3>ログイン</h3>
  <form action="account-in.php" method="post">
    <label>メールアドレス:</label>
    <input type="mail" name="mail" required><br>
    <label>パスワード:</label>
    <input type="password" name="password" required><br>
    <input type="submit" name="login" value="ログイン">
  </form>
  <a class="account-in" href="signUp.php">アカウント作成はこちら</a>
<?php include('../footer.php');?>


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
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $stmt = $pdo->prepare('select * from customer where mail = ?');
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
  header('Location: http://localhost:8888/ECsite_PF.php');
  exit();
} else {
  echo 'メールアドレス又はパスワードが間違っています。';
  return false;
}
}
?>