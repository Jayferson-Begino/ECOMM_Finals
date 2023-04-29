<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_name = $_POST['cart_name'];
   $cart_quantity = $_POST['cart_quantity'];
   $cart_curr_qty = $_POST['cart_curr_quantity'];
   $curr_qty = $cart_quantity - $cart_curr_qty;
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   mysqli_query($conn, "UPDATE `products` SET product_qty = product_qty - $curr_qty WHERE name = '$cart_name'") or die('query failed');
   $message[] = 'Cart Quantity Updated!';
}
if(isset($_POST['remove_cart'])){
   $id = $_POST['cart_id'];
   $cart_name = $_POST['cart_name'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$id'") or die('query failed');
   mysqli_query($conn, "UPDATE `products` SET product_qty = product_qty + $cart_quantity WHERE name = '$cart_name'") or die('query failed');
   $message[] = 'Item Removed!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="headingcart">
   <h3>shopping cart</h3>
</div>

<section class="shopping-cart">

   <h1 class="title">products added</h1>


   <div class="box-container">

      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
     
      <div class="box">

         <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
      <div class="price">₱<?php echo $fetch_cart['price']; ?>.00</div>
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="hidden" name="cart_name" value="<?php echo $fetch_cart['name']; ?>">
            <input type="hidden" min="1" name="cart_curr_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            <input type="submit" name="update_cart" value="update" class="option-btn">
            <input type="submit" name="remove_cart" value="remove item" class="delete-btn">
         </form>
         <div class="sub-total"> Sub Total: <span>₱<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>.00</span> </div>
      </div>
   
      <?php
      $grand_total += $sub_total;
      
         }
      }else{
         echo '<p class="empty">Your Cart is Empty!</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
   <p class="empty">Note: Please remove item/s from cart if left unpurchased for stocks regulation. If not, it will be deleted automatically after 1 day. </p>';
     
   </div>

   <div class="cart-total">
      <p>Products Sub Total: <span>₱<?php echo $grand_total; ?>.00</span></p>
      <div class="flex">
         <a href="shop.php" class="option-btn">Continue Shopping</a>
         <a href="checkout.php" class="btn" style= "background-color: #8e44ad" <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
      </div>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>