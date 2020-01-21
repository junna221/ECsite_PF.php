<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h3>ログイン</h3>
    <form action="login-out.php" method="post">
      <label>メールアドレス:</label>
      <input type="mail" name="mail" required><br>
      <label>パスワード:</label>
      <input type="password" name="password" required><br>
      <input type="submit" value="ログイン">
    </form>
    <h3>アカウントを作成</h3>
    <form action="signUp-out.php" method="post">
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