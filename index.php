<?php include('../header.php');?>
<!-- header -->
<header>
  <div class="f-container">
    <div class="search">
      <form action="search-out.php" method="post">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
      </form>
    </div>

    <div class="account">
      <a href="account-in.php">
        <span>ログイン<br>新規登録</span><br>
      </a>
    </div>

    <div class="cart">
      <a href="cart-put.php">
        <span>カート</span><br>
      </a>
    </div>
  </div>
</header>
    
<!-- content -->
<content>
      
</content>
<?php include('../footer.php');?>

<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['customer'])) {
  echo 'ようこそ' . h($_SESSION['customer']['name']) . "さん<br>";
  echo "<a href='logout-out.php'>ログアウトはこちら</a>";
  exit;
}

?>
