<?php include('head_foot/header.php');?>

<header>
  <div class="f-container">
    <!---------------ログインしている時に名前を表示する----------------->
    <?php function h($s){
    return htmlspecialchars($s, ENT_QUOTES, 'utf-8');}?>
      <?php session_start();?>
      <?php if(isset($_SESSION['customer'])):?>
      <div class="log">
        <p>ようこそ<?php echo h($_SESSION['customer']['name'])?></p><br>
        <a href='logout-out.php'>ログアウトはこちら</a>
      </div>
      <?php endif; ?>
    <div class="search">
      <form action="search-out.php" method="post">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
      </form>
    </div>

    <div class="account">
      <a href="account-in.php">
        <span>ログイン<br>新規登録</span>
      </a>
    </div>
    
    <div class="menu-buy">
      <a href="buy.php">
        <span>購入</span>
      </a>
    </div>
    
    <div class="cart">
      <a href="cart-show.php">
        <span>カート</span>
      </a>
    </div>
    
      <div class="history">
      <a href="history.php">
        <span>購入履歴</span>
      </a>
    </div>
  </div>
</header>
<?php include('head_foot/footer.php');?>

