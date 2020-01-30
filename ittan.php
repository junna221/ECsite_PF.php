
<!-------------------login.php------------------->
<?php

require_once('config.php');

session_start();


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






<!-------------------signUp.php------------------->
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





<!-------------------index.php------------------->
<?php
session_start();
$username = $_SESSION['mail'];
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = 'こんにちは' . $username . 'さん';
    $link = '<a href="logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = '<a href="login.php">ログインはこちら</a>';
    $link = '<a href="signUp.php">新規登録</a>';
}
?>



<!-------------------menu.php---------------------------->
<?php
function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['customer'])) {
  echo 'ようこそ' . h($_SESSION['customer']['name']) . "さん<br>";
  echo "<a href='logout-out.php'>ログアウトはこちら</a>";
}
?>

<?php function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}?>

<?php session_start();?>
<?php if(isset($_SESSION['customer]'):?>
<p>ようこそ<?php echo h($_SESSION['customer']['name']);?></p>

