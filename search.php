<?php
  $ProductName=$_POST['search'];
  session_start();
  if(isset($_POST['add'])){
   
    if(isset($_SESSION['cart'])){
       $item_array_id=array_column($_SESSION['cart'],"product_id");
       
       

       if(in_array($_POST['product_id'],$item_array_id)){
           echo "<script>alert('Product is already added to the cart')</script>";
           echo "<script>window.location=search.php</script>";
       }
       else{
          $count=count($_SESSION['cart']);
          
          $item_array=array(
           "product_id"=>$_POST['product_id']
          );

          $_SESSION['cart'][$count]=$item_array;
          
       }
    }else{
        $item_array=array(
            "product_id"=>$_POST['product_id']
        );

        $_SESSION['cart'][0]=$item_array;
        
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamMarket.ge</title>

    
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./stylesheets/style.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    

</head>
<body>

<!-- header section starts  -->

<header>

<div class="header-1">

    <a href="index.php" class="logo"> <i class="fas fa-shopping-bag"></i>  DreamMarket.ge</a>

    <div class="form-container">
        <form action="search.php?#arrival" method="post">
            <input type="search" name="search" placeholder="search products" id="search" /> 
            
        </form>
        
    </div>

</div>

<div class="header-2">

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#home">home</a></li>
            <li><a href="#arrival">search</a></li>
            <li><a href="#featured">featured</a></li>
            <li><a href="#gallery">Products</a></li>
            <li><a href="#deal">deals</a></li>
        </ul>
    </nav>

    <div class="icons">
        
        <a href="ShoppingCart.php" class="fas fa-shopping-cart"><?php
           if(isset($_SESSION['cart'])){
            $count=count($_SESSION['cart']);
            echo "<span>$count</span>";
         }
         else{
            echo "<span>0</span>";
         }
        ?></a>
        
    </div>

</div>

</header>

<!-- header section ends -->

<!-- home section starts  -->
<?php
   include "NewProducts.php";
?>

<section class="home" id="home">

<div class="home-slider owl-carousel">
     <?php
     
     foreach($products as $product):
     ?>
    <div class="item">
        <img src="<?=$product['imageURL']?>" alt="404">
        <div class="content">
            <h3><?=$product['name']?></h3>
            <p style="text-shadow:0 .3rem .5rem #000"><?=ProductPriceInSlider($product)?></p>
            <a href="inner.php?id=<?=$product['id']?>#arrival"><button class="btn">view</button></a>
        </div>
    </div>
    <?php
    endforeach;
    ?>

</div>

</section>

<!-- home section ends -->

<!-- arrival section starts  -->

<?php
     $search=$c->prepare("SELECT * FROM `products` WHERE `name` LIKE '%$ProductName%' ORDER BY `datetime` DESC");
     $search->execute();
     $SearchResults=$search->fetchAll(PDO::FETCH_ASSOC);
    
     
?>


<section class="arrival" id="arrival">

<h1 class="heading"> <span>search</span> </h1>

<div class="box-container">
    <?php
      if(empty($SearchResults)){
          echo "<h1>Not Found</h1>";
      }
      foreach($SearchResults as $SearchResult):
    ?>
    <div class="box">
        <div class="image">
            <img src="<?= $SearchResult['imageURL']?> " alt="404">
        </div>
        <div class="info">
            <h3 class="title"><?= $SearchResult['name']?></h3>
            <div class="subInfo">
                <strong class="price"> <?= price($SearchResult)?> </strong>
               
            </div>
        </div>
        <div class="overlay">
            
            <form action="search.php?#arrival" method="POST">
            <input type="hidden" name="search" value='<?=$ProductName?>' >
            <input type="hidden" name="product_id" value="<?=$SearchResult['id']?>">
            <button type="submit" name="add"  style="--i:2;" class="fas fa-shopping-cart cart"></button>
            </form>
            <a href="inner.php?id=<?=$SearchResult['id']?>#arrival" style="--i:3;" class="fas fa-search"></a>
        </div>
    </div>
     <?php
     endforeach;
     ?>
    

</div>

</section>

<!-- arrival section ends -->

<!-- featured section starts  -->

<?php
   include "FeaturedProduct.php"
?>

<section class="feature" id="featured">

<h1 class="heading"> <span> featured product </span> </h1>

<div class="row">

    <div class="image-container">

        <div class="big-image">
            <img src="<?=$featuredProduct[0]['imageURL']?>" alt="404">
        </div>

      

    </div>

    <div class="content">

        <h3><?=$featuredProduct[0]['name']?></h3>
        
        <p>The most popular product</p>
        <strong class="price"><?=price($featuredProduct[0])?> </strong>
        <a href="inner.php?id=<?=$featuredProduct[0]['id']?>#arrival"><button class="btn">view</button></a>

    </div>

</div>

</section>

<!-- featured section ends -->

<!-- gallery section starts  -->
<?php
  include "Allproducts.php";
  
?>

<section class="arrival" id="gallery">

<h1 class="heading"> <span> products </span> </h1>

<ul class="controls">
    <a  class="btn button-active" data-filter="all">all</a >
    <?php
        foreach($category as $category):
    ?>
    <a  class="btn" data-filter="<?=$category['category']?>"><?=$category['category']?></a >
    <?php
       endforeach;
    ?>
</ul>

<div class="box-container" id="product-filter">
<?php
   foreach($Allproducts as $Allproducts):
?>
<div class="box">
    <div class="image">
        <img src="<?=$Allproducts['imageURL']?>" alt="404">
    </div>
    <div class="info">
        <h3 class="title"><?=$Allproducts['name']?></h3>
        <div class="subInfo">
            <strong class="price"> <?=price($Allproducts)?> </strong>
            
        </div>
    </div>
    <div class="overlay">
        
        <form action="search.php?#gallery" method="POST">
            <input type="hidden" name="search" value='<?=$ProductName?>' >
            <input type="hidden" name="product_id" value="<?=$Allproducts['id']?>">
            <button type="submit" name="add"  style="--i:2;" class="fas fa-shopping-cart cart"></button>
        </form>
        <a href="inner.php?id=<?=$Allproducts['id']?>#arrival" style="--i:3;" class="fas fa-search"></a>
    </div>
    
</div>
<?php
   endforeach;
?>
</div>

     

 

</section>

<!-- gallery section ends -->

<!-- deal section starts  -->

<section class="deal" id="deal">

<h1 class="heading"> <span> best deals </span> </h1>

<div class="box-container">

    <div class="box">
        <img src="images/deal1.jpg" alt="">
        <div class="content">
            <h3>latest laptop</h3>
            <p>upto 25% off on first purchase</p>
            <a href="#"><button class="btn">explore</button></a>
        </div>
    </div>

    <div class="box">
        <img src="images/deal2.jpg" alt="">
        <div class="content">
            <h3>new headphone</h3>
            <p>upto 25% off on first purchase</p>
            <a href="#"><button class="btn">explore</button></a>
        </div>
    </div>

</div>

<div class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <h3>fast delivery</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

    <div class="icons">
        <i class="fas fa-user-clock"></i>
        <h3>24 x 7 support</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

    <div class="icons">
        <i class="fas fa-money-check-alt"></i>
        <h3>easy payments</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

    <div class="icons">
        <i class="fas fa-box"></i>
        <h3>10 days replacements</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p>
    </div>

</div>

</section>

<!-- deal section ends -->

<!-- newsletter section starts  -->

<section class="newsletter">

    <h1>newsletter</h1>
    <p>get in touch for latest discounts and updates</p>
    <form action="">
        <input type="email" placeholder="enter your email">
        <input type="submit" class="btn">
    </form>

</section>

<!-- newsletter section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <a href="index.php" class="logo"> <i class="fas fa-shopping-bag"></i>  DreamMarket.ge</a>
        </div>

        <div class="box">
            <h3>links</h3>
            <a href="#home">home</a>
            <a href="#arrival">search</a>
            <a href="#featured">featured</a>
            <a href="#gallery">Products</a>
            <a href="#deal">deals</a>
        </div>

        <div class="box">
            <h3>contact us</h3>
            <p> <i class="fas fa-home"></i>
               tbilisi, 
                georgia  - 123456789
            </p>
            <p> <i class="fas fa-phone"></i>
                +123456789
            </p>
            <p> <i class="fas fa-globe"></i>
               @Gmail.com
            </p>
        </div>

    </div>

<h1 class="credit"> created by <span>DreamMarket.ge </span> | all rights reserved. </h1>

</section>

<!-- footer section ends -->











<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js file link  -->
<script src="./js.js"></script>
    
</body>
</html>
