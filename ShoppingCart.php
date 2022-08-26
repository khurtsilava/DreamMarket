<?php
   include "connect.php";
   session_start();

   
function FPrice($products){
    if($products['discounted price']==null){
        return $products['price'].'$';
    }
    else{
        return $products['discounted price'].'$';
    }
}

   $Allprod=$c->prepare("SELECT * FROM `products` ORDER BY `datetime` DESC");
   $Allprod->execute();
   $Allproducts=$Allprod->fetchAll(PDO::FETCH_ASSOC);

   if(isset($_POST['remove'])){
     if($_GET['action']=='remove'){
       foreach($_SESSION['cart'] as $key=>$value){
         if($value['product_id']==$_GET['id']){
           unset($_SESSION['cart'][$key]);
           if(empty($_SESSION['cart'])){
            unset($_SESSION['cart']);
           }
           echo "<script>alert('Product has been removed...!')</script>";
           echo "<script>window.location='ShoppingCart.php'</script>";
           
         }
       }
     }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon" >
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link rel="stylesheet" href="./stylesheets/style.css">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./stylesheets/cart.css">

    

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    

</head>
<body>

<!-- header section starts  -->

<header>

<div class="header-1">

    <a href="index.php" class="logo" style="text-decoration: none!important;"> <i class="fas fa-shopping-bag" style="text-decoration: none!important;"></i>  Cart </a>

</div>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Your Cart</title>
</head>

<body>


  <!-- Cart Items -->
  <div class="container-md cart">
    <table >
      <tr class="itemdetails">
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
      <?php
      $total=0;

      if(isset($_SESSION['cart'])){
        $product_id=array_column($_SESSION['cart'],'product_id');
       
        foreach($Allproducts as $Allproduct){
            foreach($product_id as $id){
               if($Allproduct['id']==$id){
                   echo    '<form action="ShoppingCart.php?action=remove&id='.$Allproduct['id'].'" method="POST" ">';
                   echo     '<tr>';
                   echo         '<td>';
                   echo           '<div class="cart-info">';
                   echo             '<img src="'.$Allproduct['imageURL'].'" alt="">';
                   echo             '<div>';
                   echo               '<p>'.$Allproduct['name'].'</p>';
                   echo               '<br />';
                   echo               '<button name="remove" type="submit" style="background:red;border:none;padding:5px;border-radius:5px;">Remove</button>';
                   echo             '</div>';
                   echo           '</div>';
                   echo         '</td>';
                   echo         '<td><input type="number" value="1" min="1"></td>';
                   echo         '<td class="price">'.FPrice($Allproduct).'</td>';
                   echo       '</tr>';
                   echo     '</form>';

                   $total=$total+(int)FPrice($Allproduct);
                }
            }
           
        }
      }
      else{
          echo "<tr><td><h5>Cart Is empty</h5></td></tr>";
      }
         

      ?>
   </table>

    <div class="total-price">
      <table>
        <tr>
          <td>Subtotal</td>
          <td>$<?=$total?></td>
        </tr>
        <tr>
          <td>Tax</td>
          <td>$50</td>
        </tr>
        <tr>
          <td>Total</td>
          <td>$<?php
          if(isset($_SESSION['cart'])){
           echo ($total+50);
          }
          else{
            echo 0;
          }
          ?></td>
        </tr>
      </table>
      <a href="#" class="checkout btn">Proceed To Checkout</a>

    </div>

  </div>







   












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    
</body>
</html>