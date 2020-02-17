<?php include('head_foot/header.php');?>

<header>
  <div class="f-container">
    <!---------------ログインしている時に名前を表示する----------------->
    <?php function h($s){
    return htmlspecialchars($s, ENT_QUOTES, 'utf-8');}?>
      <?php session_start();?>
      <?php if(isset($_SESSION['customer'])):?>
      <p>ようこそ<?php echo h($_SESSION['customer']['name'])?></p>
      <a href='logout-out.php'>ログアウトはこちら</a>
      <?php endif; ?>
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
      <a href="cart-show.php">
        <span>カート</span><br>
      </a>
    </div>
  </div>
</header>
<?php include('head_foot/footer.php');?>

