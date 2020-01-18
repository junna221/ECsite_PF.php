<?php

session_start();

require_once('config.php');


$mail = $_POST['mail'];
$password = $_POST['password'];

try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
} catch (PDOException $e) {
  $msg = $e->getMessage();
}
  $sql = "SELECT * FROM customer WHERE mail = :mail AND password = :password";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':mail', $mail);
  $stmt->bindValue(':password', $password);
  $stmt->execute();
  $member = $stmt->fetch();
  if ($member) {
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました';
    $link = '<a href="index.php">ホーム</a>';
  }else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
        $link = '<a href="login.php">戻る</a>';
  }
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>ログイン</title>
  </head>
  <body>
    <h3>ログイン</h3>
    <form action="login.php" method="post">
      <label>メールアドレス:</label>
      <input type="mail" name="mail" required><br>
      <label>パスワード:</label>
      <input type="password" name="password" required><br>
      <input type="submit" value="ログイン">
    </form>
  </body>
</html>