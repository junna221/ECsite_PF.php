<?php

define('DSN','mysql:host=127.0.0.1;dbname=amshop');
define('DB_USER','sta');
define('DB_PASS','pass12');

$pdo = new PDO(DSN, DB_USER, DB_PASS);


?>