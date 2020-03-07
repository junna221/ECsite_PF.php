<?php

define('DSN','mysql:host=localhost;dbname=amshop');
define('DB_USER','staff');
define('DB_PASS','pass12');
define('DB_sock','unix_socket=/tmp/mysql.sock')
$pdo = new PDO(DSN, DB_sock, DB_USER, DB_PASS);


?>