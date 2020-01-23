
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div>
      <form action="search-out.php" method="post">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
      </form>
    </div>
    
    <div>
      <a href="account-in.php">
        <span>ログイン<br>新規登録</span><br>
      </a>
    </div>
      <a href="cart-put.php">
        <span>カート</span><br>
      </a>
    <div>
      
    </div>
  </body>
</html>

<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['mail'])) {
  echo 'ようこそ' . h($_SESSION['mail']) . "さん<br>";
  echo "<a href='logout.php'>ログアウトはこちら</a>";
  exit;
}

?>
