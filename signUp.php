<?php
require_once('config.php');

$name = $_POST['name'];
$address = $_POST['address'];
$mail = $_POST['mail'];

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
//登録処理
try {
  $stmt = $pdo->prepare("insert into customer(name, address, mail, password) value(?,?,?, ?)");
  $stmt->execute([$name,$address,$mail, $password]);
  echo '登録完了';
} catch (\Exception $e) {
  echo '登録済みのメールアドレスです。';
}