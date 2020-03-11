<?php

function dbConnect(){
  $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
  $db['amshop'] = ltrim($db['http://localhost:8888/phpMyAdmin/db_structure.php?server=1&db=amshop'], '/');
  $dsn = "mysql:host={$db['localhost']};amshop={$db['amshop']};charset=utf8";
  $user = $db['staff'];
  $password = $db['pass12'];
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
  );
  $pdo = new PDO($dsn,$user,$password,$options);
  return $pdo;
}


?>