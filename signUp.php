<?php include('head_foot/header.php');?>
<p class="signup_top">
  <a href="index.php"><img src="image/shop.png"></a>
  </p>
  <div class="signup">
    <h1>アカウントを作成</h1>
    <form action="signUp.php" method="post">
      <label class="name_su">名前</label><br>
      <input type="text" name="name" required><br>
      <label class="address_su">住所</label><br>
      <input type="address" name="address" required><br>
      <label class="mail_su">メールアドレス</label><br>
      <input type="mail" name="mail" placeholder="例：www@gmail.com" required><br>
      <label class="pass_su">パスワード</label><br>
      <input type="password" name="password" placeholder="半角英数字をそれぞれ1文字以上含んだ8文字以上" required><br>
      <input type="submit" name="sigUp" value="新規登録">
    </form>
  </div>
  <div class="signup_new">
    <h2>すでにアカウントをお持ちの方</h2>
    <p class="signup-in"><a href="account-in.php">ログイン</a></p>
  </div>
<?php include('head_foot/footer.php');?>


<?php
include('config.php');

if (isset($_POST["sigUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["mail"])) {  // emptyは値が空のとき
        $errorMessage = 'IDが未入力です。';
    }

//データベースへ接続
try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  $msg = $e->getMessage();
}
//POSTのValidate。
if (!$mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}
//パスワードの正規表現
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
  echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
  return false;
}

$name = $_POST['name'];
$address = $_POST['address'];
$mail = $_POST['mail'];
//登録処理
try {
  $stmt = $pdo->prepare("insert into customer(name, address, mail, password) value(?,?,?, ?)");
  $stmt->execute([$name,$address,$mail, $password]);
  echo 'アカウント作成が完了しました';
} catch (\Exception $e) {
  echo '登録済みのメールアドレスです。';
}
}
?>