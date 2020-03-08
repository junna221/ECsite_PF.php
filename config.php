<?php

define('DSN','mysql:unix_socket=/tmp/mysql.sock; dbname=amshop; ;charset=utf8');
define('DB_USER','staff');
define('DB_PASS','pass12');

$pdo = new PDO(DSN, DB_USER, DB_PASS);


?>