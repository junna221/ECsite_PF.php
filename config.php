<?php
if(($_SERVER['CLEARDB_DATABASE_URL'])){
$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
  $db['dbname'] = ltrim($db['path'], '/');
  $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
  $user = $db['user'];
  $password = $db['pass'];
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
  );

$pdo = new PDO($dsn,$user,$password,$options);
  return $pdo;
} else{
  define('DSN','mysql:host=localhost;dbname=amshop;charset=utf8;');
define('DB_USER','staff');
define('DB_PASS','pass12');

$pdo = new PDO(DSN,DB_USER,DB_PASS);
}

?>