<?php include('menu.php');?>
<?php

$id = $_REQUEST['id'];
if (!isset($_SESSION['product'])){
  $_SESSION['product'] =[];
}

$num = 0;
if (isset($_SESSION['product']['$id'])) {
  $num = $_SESSION['product'][$id]['num'];
}

$_SESSION['product'][$id] = [
  'num' => $num+$_REQUEST['num']
];
include('cart-out.php');
?>