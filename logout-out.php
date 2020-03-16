<?php
session_start();

if (isset($_SESSION["mail"])) {
  echo 'ログアウトしました。';
  header('Location: https://shopping-site-php.herokuapp.com/');
  exit();
  //header('location: http://localhost:8888/ECsite_PF.php/');
} else {
  echo 'SessionがTimeoutしました。';
}
//セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//セッションクリア
@session_destroy();