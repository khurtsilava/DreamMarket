<?php

//connect to database
try{
   $c=new PDO("mysql:dbname=shop;host=127.0.0.1;port=3306","root");
}
catch(PDOException $e){
    echo "connection failed:";  
    
    die($e->getMessage());
}





