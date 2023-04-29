<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="headingabout">
   
   <h3>about us</h3>
</div>

<section class="about">
<div class="opening">
<h3> Welcome To Moo Med Store - A New Experience In Health, Beauty And Well-Being</h3>
</div>

   <div class="flex">

      <div class="image">
         <img src="LOGO.png" alt="">
      </div>

      <div class="content">
         <h3>YOUR ONE-STOP SOLUTION FOR ALL MEDICINE NEEDS</h3>
         <p>The MOO Med Shop is backed by professionals with nearly two decades of experience in medical supplies and equipment.
             With our partners from the Philippines and all over the world, The Medical Shop features a wide array of quality products for home health care and the healthcare practitioner.
              Our commitment to customer satisfaction ensures shopping ease and timely product deliveries. 
              Every day, The MOO Med Shop Direct offers these and more customers in the Philippines.</p>
         <p>The MOO Med Store is backed by professionals with nearly two decades of experience in medical supplies and equipment. 
      With our partners from the Philippines and all over the world, The MOO Med Store features a wide array of quality products for home health care and many more.
      Our commitment to customer satisfaction ensures shopping ease and timely product deliveries. 
      The MOO Med Store Direct provides these services and more to Filipino customers every day.
      </p>
        
      </div>

   </div>

</section>
<!-- why moo -->

<section class="choose">
<h1 class="title"> Why choose Moo Med Store?</h1>

  
    <div class="box-container">

        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>Genuine Medicines</h3>
 
        </div>

        <div class="box">
            <i class="fas fa-truck"></i>
            <h3>Quick Medicine Delivery at your Doorsteps</h3>
          
        </div>

        <div class="box">
            <i class="fas fa-cart-shopping"></i>
            <h3>Fast and easy medicine ordering</h3>

        </div>

        <div class="box">
            <i class="fas fa-credit-card"></i>
            <h3>100% secure and safe payment method</h3>
   
        </div>
        <div class="box">
            <i class="fas fa-user-doctor"></i>
            <h3>Your health is our priority</h3>
   
        </div>

      

    </div>

</section>

<!-- services section ends -->


<section class="partners">

   <h1 class="title">Our Partners</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/p1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3><a href="https://dosedesign.uk/">DOSE</a></h3>
      </div>

      <div class="box">
         <img src="images/p2.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3><a href="https://www.bd.com/en-uk/products/browse-brands/rowa">Rowa-BD</a></h3>
      </div>

      <div class="box">
         <img src="images/p3.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3><a href="https://www.velresco.com/">Velresco </a></h3>
      </div>

      <div class="box">
         <img src="images/p4.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3><a href="https://pancreaticcanceraction.org/healthcare-professionals/resources-for-pharmacists/pharmacy-e-learning-module/">pca </a></h3>
      </div>

    

   </div>

</section>


<section class="reviews">

   <h1 class="title">Customer reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/r2.png" alt="">
         <p>Very helpful especially this pandemic. It also has a COD too so.
             Gobless getmedsph hope you continue the quality service to help people who needs it most.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Winde Maraine Renolayan</h3>
      </div>

      <div class="box">
         <img src="images/r2.png" alt="">
         <p>I'm new to this online buying of medicine. but I can say that this company is efficient because it can give the needs that our physical pharmacy cant provide personally.
             Thank you so much</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Luis Daniel Serafica</h3>
      </div>

      <div class="box">
         <img src="images/r2.png" alt="">
         <p>1st time user here and their portal is user friendly. The meds I ordered for my mom, who is living away from me and alone in an urban area, has been delivered on the same day. 
            Thanks a lot.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Miv Manlangit</h3>
      </div>

      <div class="box">
         <img src="images/r2.png" alt="">
         <p>I am thankful for the help . It's my 2nd time around of orders and all are in good conditions. 
            Very accommodating to talk with the needs and details of all orders. Thank you.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Josh Reverente</h3>
      </div>

      <div class="box">
         <img src="images/r2.png" alt="">
         <p>Im really pleased to have a very reliable online pharmacy! So helpful to get my pharmacy needs and prescriptions medicines on the same day! Thank you!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Riessa Gamuyao</h3>
      </div>

      <div class="box">
         <img src="images/r2.png" alt="">
         <p>Highly recommend this company! They go above and beyond to make sure your prescription is filled. If the medicine is out of stock, they really make the effort to find it for you. 
            Thank you. 5/5!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Gail Nebres</h3>
      </div>

      </div>

</section>

<div class="button">
         <a href="contact.php" class="btn"style= "background-color: #666">Click to send a Review</a>
   </div>
<section class="top">
   
<button id="myBtn"><a href="#top" class="fas fa-arrow-up "></a></button>

</section>



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>