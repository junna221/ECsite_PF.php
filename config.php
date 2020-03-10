<?php

$url = parse_url(getenv("mysql://b911fee2114125:4016935a@us-cdbr-iron-east-04.cleardb.net/heroku_5d73596d6e4ca75?reconnect=true"));

$server = $url["localhost"];
$username = $url["staff"];
$password = $url["pass12"];
$db = substr($url["http://localhost:8888/phpMyAdmin/db_structure.php?server=1&db=amshop"], 1);

$conn = new mysqli($server, $username, $password, $db);

?>