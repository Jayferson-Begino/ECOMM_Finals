<?php

include 'config.php';

session_start();

$admin_id = $_SESSION ['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('Query failed!');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/adminstyle.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> Admin Accounts </h1>

   
<div style="overflow-x:auto;">
<table>
            <tr>
            <th>USER ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>USER TYPE</th>
          
           
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users`WHERE user_type = 'admin'") or die('Query failed!');
           if(mysqli_num_rows($select_users) > 0){
                // LOOP TILL END OF DATA
                while($fetch_users = mysqli_fetch_assoc($select_users)){
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $fetch_users['id'];?></td>
                <td><?php echo $fetch_users['name']; ?></td>
                <td><?php echo $fetch_users['email'];?></td>
                <td><?php if($fetch_users['user_type'] == 'ADMIN'){ echo 'var(--orange)'; } ?><?php echo $fetch_users['user_type']; ?></td>
                <td> <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return CONFIRM('delete this user?');" class="delete-btn">DELETE USER</a></td>
   </div>
            </tr>
            <?php
                }
               }else{
                  echo '<p class="empty">No Users</p>';
               }
            ?>
        </table>
        </div>
</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>