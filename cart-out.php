<?php

if(!empty($_SESSION['customer'])){
 foreach ($_SESSION['product'] as $id=>$product) {
  echo '<h1>',$product['num'],'</h1>';
}
}else {
  echo 'カートへ追加するにはログインが必要です';
}

?>