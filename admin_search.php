<?php

include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'Payment Status has been Updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/adminstyle.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

   

<section class="adminsearch-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="Name of Customer" class="box">
      <input type="submit" name="submit" value="search" class="btn" style= "background-color: #ea0f8f">
   </form>

   <div class="box-container">
   <?php
      if(isset($_POST['submit'])){
         $search_orders = $_POST['search'];
         $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE name LIKE '%{$search_orders}%'") or die('query failed');
         if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
   ?>
   <div class="box">
         <p> USER ID : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> PLACED ON : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> NAME : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> NUMBER : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> EMAIL : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> ADDRESS : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> TOTAL PRODUCTS : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> TOTAL PRICE : <span>₱<?php echo $fetch_orders['total_price']; ?>.00</span> </p>
         <p> PAYMENT METHOD : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_payment">
               <option value="  "selected disabled> <?php echo $fetch_orders['payment_status']; ?> </option>
               <option value="Pending">PENDING</option>
               <option value="Completed">COMPLETED</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return CONFIRM('delete this order?');" class="delete-btn">DELETE</a>
         </form>
    </div>
   <?php
            }
         }else{
            echo '<p class="empty">No Orders Found!</p>';
         }
      }
   ?>
   </div>
  

</section>










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>