<?php
if (!empty($_SESSION['customer'])) {
  echo 'ログインできてる！';
}else {
  echo 'ログインしてください';
}

?>