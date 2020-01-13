<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (iseet($_SESSION['login'])) {
  echo 'ようこそ' h($_SESSION['login']) "さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    
  </head>
  <body>
  
  </body>
</html>