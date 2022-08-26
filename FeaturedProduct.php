<?php

include "connect.php";

//get featured product

$featuredProd=$c->prepare("SELECT * FROM `products` ORDER BY `views` DESC,`name` ASC LIMIT 1");
$featuredProd->execute();
$featuredProduct=$featuredProd->fetchAll(PDO::FETCH_ASSOC);