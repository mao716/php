<?php
$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
$item = htmlspecialchars($_POST['item'], ENT_QUOTES);
$quantity = htmlspecialchars($_POST['quantity'], ENT_QUOTES);

echo "私の名前は、" . $username . "<br>";
echo "ご希望の商品は、" . $item . "<br>";
echo "注文数は、" . $quantity . "<br>";