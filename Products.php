<?php

//  Session Started to get User Sign-In Data and connect to the database
include "inc\db_conn.php";
session_start();
$user_id = $_SESSION['id'];
$userName = $_SESSION['userName'];
$userID = $_SESSION['userID'];

// Check if the user Signed in or not
if (isset($_SESSION['id']) && isset($_SESSION['userID'])) {
?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="Styles/Items.scss">
      <link rel="stylesheet" href="Styles/footer.scss">
      <link rel="stylesheet" href="Styles/header.scss">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
      <script>
         // To get the header and footer files
         $(function() {
            $('#header').load('./assets/php/header.php');
         })
         $(function() {
            $('#footer').load('./assets/php/footer.php');
         })
      </script>

      <title>Marketify - Products</title>

   </head>

   <body>


      <!-- Header Section -->
      <section id="header"></section>


      <!-- My Prodcuts Section -->
      <section id="stay">
         <div class="containerH">
            <h1>#Grab it NOW</h1>
         </div>
         <a href="myProducts.php" type="button" class="MyProducts">My Products</a>
      </section>



      <!-- Latest Products Section -->
      <div class="container">
         <section class="products" id="products">
            <h1 class="heading">latest products</h1>

            <div class="box-container">
               <?php
               // Select the products from the table except the signed in user products
               $select_products = mysqli_query($conn, "SELECT * FROM products WHERE userID != '$userID' ");
               if (mysqli_num_rows($select_products) > 0) {
                  while ($fetch_product = mysqli_fetch_assoc($select_products)) {
               ?>
                     <section id="productss" class="productss">
                        <a href="subProduct.php?id=<?= $fetch_product['id']; ?>">
                           <div class="pro-container">
                              <div class="pro">
                                 <img src="img/products/<?php echo $fetch_product['image']; ?>" alt="">
                                 <div class="des">
                                    <span><?php echo $fetch_product['userName']; ?></span>
                                    <h5><?php echo $fetch_product['name']; ?></h5>
                                    <div class="star">
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                       <i class="fas fa-star"></i>
                                    </div>
                                    <h4><span>RM </span><?php echo $fetch_product['price']; ?></h4>
                                 </div>
                                 <form action="" method="get">
                                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                    <a href="./checkout.php?id=<?= $fetch_product['id']; ?>" type="submit"><i class="fa-solid fa-bag-shopping buy"></i></a>
                                 </form>
                              </div>
                           </div>
                        </a>
                     </section>
                  <?php
                  }
               } else {
                  ?> <h1 class="NoP">Sorry... No Products &#128546;</h1>
               <?php
               }
               ?>

            </div>
         </section>
      </div>


      <!-- Footer Section -->
      <footer id="footer" role="contentinfo"></footer>

   </body>

   </html>

<?php
} else {
   header('Location: Sign-up Page.php');
   exit();
}

?>