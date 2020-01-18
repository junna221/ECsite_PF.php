<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['mail'])) {
  echo 'ようこそ' . h($_SESSION['mail']) . "さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
}

 ?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>新規登録</title>
  </head>
  <body>
    <h3>アカウントを作成</h3>
    <form action="signUp.php" method="post">
      <label>名前:</label>
      <input type="text" name="name" required><br>
      <label>住所:</label>
      <input type="address" name="address" required><br>
      <label>メールアドレス:</label>
      <input type="mail" name="mail" required><br>
      <label>パスワード:</label>
      <input type="password" name="password" required><br>
      <input type="submit" value="新規登録">
    </form>
  </body>
</html>

<?php

require_once('config.php');

$name = $_POST['name'];
$address = $_POST['address'];
$mail = $_POST['mail'];
$password = $_POST['password'];

//データベースへ接続
try{
  $pdo = new PDO(DSN,DB_USER,DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  $msg = $e->getMessage();
}

 //フォームに入力されたmailがすでに登録されていないかチェック
    $sql = "SELECT * FROM customer WHERE mail = :mail ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();
    $member = $stmt->fetch();
    if ($member['mail'] == $mail) {
        $msg = '同じメールアドレスが存在します。';
        $link = '<a href="signup.php">戻る</a>';
    } else {
        //登録されていなければinsert 
        $sql = "INSERT INTO customer(name, address, mail, password) VALUES (:name, :address, :mail, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $msg = '会員登録が完了しました';
        $link = '<a href="login.php">ログインページ</a>';
    }

?>
<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>