<?php

define('DSN','mysql:host=https://shopping-site-php.herokuapp.com/;dbname=amshop');
define('DB_USER','staff');
define('DB_PASS','pass12');

$pdo = new PDO(DSN, DB_USER, DB_PASS);


?>