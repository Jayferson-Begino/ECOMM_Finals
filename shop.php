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
   $date_added= date('Y-m-d');

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
         $conn->query("UPDATE products SET product_qty='$curr_qty' WHERE name = '$product_name'") or die(mysqli_error($conn));
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
   <title>Shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="headingshop">
   <h3>CROP COMM STORE</h3>
</div>

<section class="productshop">

   <h1 class="title">shop now!</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="date">Date restocked: <?php echo $fetch_products['date_and_time_added']; ?></div>
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

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>