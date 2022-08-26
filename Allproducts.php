<?php
include "connect.php";

//get all products from database and filter

function FPrice($products){
    if($products['discounted price']==null){
        return $products['price'].'$';
    }
    else{
        return $products['discounted price']. '$  <span>$'. $products['price'].'</span>';
    }
}







if(!isset($_POST['request'])){
    
       
        $Allprod=$c->prepare("SELECT * FROM `products` ORDER BY `datetime` DESC");
        $Allprod->execute();
        $Allproducts=$Allprod->fetchAll(PDO::FETCH_ASSOC);
       

}
else{
     

     
      if($_POST['request']=="all"){
          
        
            $Allprod=$c->prepare("SELECT * FROM `products` ORDER BY `datetime` DESC");
            $Allprod->execute();
            $Allproducts=$Allprod->fetchAll(PDO::FETCH_ASSOC);
  
            
            
      
             foreach($Allproducts as $product){
             echo '<div class="box">';
             echo '<div class="image">';
             echo '<img src='. $product['imageURL'] .' alt="404">';
             echo '</div>';
             echo '<div class="info">';
             echo '<h3>'. $product['name'].'</h3>';
             echo '<div class="subInfo">';
             echo "<strong class='price'>".FPrice($product)."</strong>";
             echo '</div>';
             echo '</div>';
             echo '<div class="overlay">';
             echo  '<form action="index.php" method="POST">';
             echo  '<input type="hidden" name="product_id" value="'.$product["id"].'">';
             echo  '<button type="submit" name="add"  style="--i:2;" class="fas fa-shopping-cart cart"></button>';
             echo  '</form>';
             echo '<a href="inner.php?id='.$product['id'].'#arrival" style="--i:3;" class="fas fa-search"></a>';
             echo '</div>';
             echo '</div>';
             
             }
          
          
        
          
     
          
         
        


       }
      else
      {
        
            $category=$_POST['request'];
            $Filteredprod=$c->prepare("SELECT * FROM `products` WHERE `category`='$category' ORDER BY `datetime` DESC");
            $Filteredprod->execute();
            $Filteredproducts=$Filteredprod->fetchAll(PDO::FETCH_ASSOC);
    
            foreach($Filteredproducts as $Filteredproduct){
            echo '<div class="box">';
            echo '<div class="image">';
            echo '<img src='. $Filteredproduct['imageURL'] .' alt="404">';
            echo '</div>';
            echo '<div class="info">';
            echo '<h3>'. $Filteredproduct['name'].'</h3>';
            echo '<div class="subInfo">';
            echo "<strong class='price'>".FPrice($Filteredproduct)."</strong>";
            echo '</div>';
            echo '</div>';
            echo '<div class="overlay">';
            echo  '<form action="index.php" method="POST">';
            echo  '<input type="hidden" name="product_id" value="'.$Filteredproduct['id'].'">';
            echo  '<button type="submit" name="add"  style="--i:2;" class="fas fa-shopping-cart cart"></button>';
            echo  '</form>';
            echo '<a href="inner.php?id='.$Filteredproduct['id'].'#arrival" style="--i:3;" class="fas fa-search"></a>';
            echo '</div>';
            echo '</div>';
           }
        
        

       
       
    }
}







$categories=$c->prepare("SELECT `category` FROM `products` GROUP BY `category`");
$categories->execute();
$category=$categories->fetchAll(PDO::FETCH_ASSOC);

