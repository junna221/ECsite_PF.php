<?php

ini_set('display_errors',1);

define('DSN','mysql:host=localhost;dbname=amshop');
define('DB_USER','staff');
define('DB_PASS','pass12');

$pdo = new PDO(DSN, DB_USER, DB_PASS);


?>