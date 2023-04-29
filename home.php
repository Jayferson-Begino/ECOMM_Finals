<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_qty = $_POST['product_qty'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $date_added= date('d-M-Y');

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'Already Added to Cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image, date_added) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$date_added')") or die('query failed');
      $curr_qty = $product_qty - $product_quantity;
      if($curr_qty <=0){
         $message[] = 'Insufficient stocks!';
      }else{
         $curr_qty = $product_qty - $product_quantity;
         $conn->query("UPDATE products SET product_qty='$curr_qty' WHERE name = '$product_name'") or die($db_link->error);
         $message[] = 'Product Added to Cart!';
      }
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>


<section class="home">
<div class="video-wrapper">
   <video playsinline autoplay muted loop poster="images/moo.png">
    <source src="images/hvid.mp4" type="video/mp4">
   </video>
   </div>

   <div class="content">
      <h3>We Plant Connections, We Grow Partnerships</h3>
      <p>For Reliable and Quick purchase delivery in the Philippines. Choose Us.</p>
      <a href="about.php" class="white-btn"style= "background-color: #7bb701">DISCOVER MOO</a>
   </div>

</section>
<!-- carousel -->
<section class="carouselz">
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel" >
 <!-- Indicators -->
 <ol class="carousel-indicators">
   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
   <li data-target="#myCarousel" data-slide-to="1"></li>
   <li data-target="#myCarousel" data-slide-to="2"></li>
 </ol>
 <!-- Wrapper for slides -->
 <div class="carousel-inner" role="listbox">
   <div class="item active">
     <div class="container">
        <img src="images/1.jpg" class="img-fluid" >
    </div>
   </div>
   <div class="item">
     <div class="container">
      <img src="images/2.jpg" class="img-fluid" >
  </div>
   </div>
   <div class="item">
     <div class="container">
      <img src="images/3.jpg" class="img-fluid" >
  </div>
   </div>
 </div>

 <!-- Left and right controls -->
 <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
 </a>
 <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
 </a>
</div>

</section>
 <!-- products -->
<section class="productshop">

   <h1 class="title">Latest Products</h1>

      <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="product_qty" min=0>Stocks: <?php echo $fetch_products['product_qty']; ?></div>
      <div class="price">₱<?php echo $fetch_products['price']; ?>.00</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_qty" value="<?php echo $fetch_products['product_qty']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn"style= "background-color: #f1a50f">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">No Products Added Yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn"style= "background-color: #424242">Load More</a>
   </div>

</section>
<!-- blogs section starts  -->

<section class="home-blogs">

    <h1 class="title">HEALTH ARTICLES </h1>

    <div class="box-container">
    <div class="box">
            <div class="image">
                <img src="images/article1.jpg" alt="">
            </div>
            <div class="content">
                
                <h3>Ear Wax Removal- What Treatment You Must Do</h3>
                <p>Each and every person needs to be clean always to maintain a healthy lifestyle. But cleaning inside your ears is the most difficult thing to do. You might do it by inserting earbuds or cotton. But you probably heard that doctors don’t recommend inserting anything into your ears.....</p>
                <a href="https://getmeds.ph/blog/ear-wax-removal/" class="btn"style= "background-color: #2a0475"> Read more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/article2.jpg" alt="">
            </div>
            <div class="content">
                <h3>Prevention: 8 Most Common Nutrient Deficiencies</h3>
                <p>As a busy bee, you may prioritize work, among other things, including your health. Aside from the usual diseases, nutrient deficiency is a common health issue that you can neglect or take with little importance. You’re only reminded to focus on your wellness once you start to feel symptoms of certain illnesses.....</p>
                <a href="https://getmeds.ph/blog/common-nutrient-deficiencies-and-how-to-prevent-them/" class="btn"style= "background-color: #2a0475"> Read more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
       
        <div class="box">
            <div class="image">
                <img src="images/article3.png" alt="">
            </div>
            <div class="content">
                
                <h3>How AI Can Help in Chronic Care?</h3>
                <p>Chronic conditions are a major concern across the globe. And here is the proof! US healthcare spends almost $1.65 trillion on chronic care. Approximately 14% of Canadian people are suffering from at least 2+ chronic disease. Chronic conditions are the leading cause of death in the Philippines....</p>
                <a href="https://getmeds.ph/blog/how-ai-can-help-in-chronic-care/" class="btn"style= "background-color: #2a0475"> Read more <span class="fas fa-chevron-right" ></span> </a>
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->
<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about.svg" alt="">
      </div>

      <div class="content">
         <h3>About Us</h3>
         <p>The MOO Med Shop is backed by professionals with nearly two decades of experience in medical supplies and equipment.
             With our partners from the Philippines and all over the world, The Medical Shop features a wide array of quality products for home health care and the healthcare practitioner.
              Our commitment to customer satisfaction ensures shopping ease and timely product deliveries. 
              Every day, The MOO Med Shop Direct offers these and more customers in the Philippines.</p>
         <a href="about.php" class="btn"style= "background-color: #666">Read More</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
   <form>
      <h3>MOO MED STORE NEWSLETTER</h3>
      <p>Stay informed about our latest offers.</p>
         <input type="email" class="form-control mt-2" id="emailenter" placeholder="email@gmail.com">

    <button class="white-btn"style= "background-color: #2a0475" input type="submit">Subscribe</button>
                                               
    </form>
   </div>
    
</section>

<section class="top">
   
<button id="myBtn"><a href="#top" class="fas fa-arrow-up "></a></button>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>