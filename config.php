<?php

define('DSN','mysql:host=localhost;dbname=amshop');
define('DB_USER','staff');
define('DB_PASS','pass12');
define('DB_sock','unix_socket=/tmp/mysql.sock')
define('DB_cha','charset=utf8')
$pdo = new PDO(DSN, DB_cha,DB_sock, DB_USER, DB_PASS);


?>