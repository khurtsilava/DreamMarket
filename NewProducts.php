<?php

include "connect.php";

$prod=$c->prepare("SELECT * FROM `products` ORDER BY `datetime` DESC LIMIT 6");
$prod->execute();
$products=$prod->fetchAll(PDO::FETCH_ASSOC);

function price($products){
   $products['discounted price']==null ? print $products['price'].'$': print $products['discounted price']. '$  <span>$'. $products['price'].'</span>';
}

function ProductPriceInSlider($products)
{
    $products['discounted price']==null ? print $products['price'].'$' : print $products['discounted price'].'$';
}

