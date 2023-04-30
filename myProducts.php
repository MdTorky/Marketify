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
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
      <script src="jquery-3.6.1.min.js"></script>
      <script src="sweetalert2.all.min.js"></script>
      <script type="text/javascript" src="./script/script.js"></script>
      <?php if (isset($_GET['m'])) : ?>
         <div class="flash-data" data-flashdata=" <?= $_GET['m']; ?>"></div>
      <?php endif; ?>
      <style>
         .swal-wide {
            width: 350px !important;
            font-size: 1.6rem !important;
         }
      </style>
      <script>
         function confirmationDelete(anchor) {

            Swal.fire({
               type: 'warning',
               title: 'Are You Sure?',
               text: 'Product Will Be Deleted',
               showCancelButton: true,
               customClass: 'swal-wide',
               confirmButtonColor: '#009e60',
               cancelButtonColor: '#ed2939',
               confirmButtonText: 'Delete Product',
            }).then((result) => {
               if (result.value) {
                  window.location = anchor.attr("href");
               }
            })
         }
         const flashdata = $('.flash-data').data('flashdata')
         if (flashdata) {
            Swal.fire({
               type: 'success',
               customClass: 'swal-wide',
               title: 'Success',
               text: 'Product Deleted Successfully',
            })
         }
         // To get the header and footer files
         $(function() {
            $('#header').load('./assets/php/header.php');
         })
         $(function() {
            $('#footer').load('./assets/php/footer.php');
         })
      </script>
      <title><?= $_SESSION['userName']; ?> Products</title>

   </head>

   <body class="bodyP">


      <!-- Header Section -->
      <section id="header"></section>


      <!-- Products' History Section -->
      <div class="centerButton">
         <h1 class="heading2 move-horizontal"><span>Products' History</span></h1>
         <div class="containerButton" onclick="location.href='#divTwo'">
            <div class="button1" id="button-7">
               <div id="dub-arrow"><img src="https://github.com/atloomer/atloomer.github.io/blob/master/img/iconmonstr-arrow-48-240.png?raw=true" alt="" /></div>
               <a href="#divTwo" class="button-1">BOUGHT</a>
            </div>
         </div>

         <div class="containerButton" onclick="location.href='#divOne'">
            <div class="button2" id="button-71">
               <div id="dub-arrow1"><img src="https://github.com/atloomer/atloomer.github.io/blob/master/img/iconmonstr-arrow-48-240.png?raw=true" alt="" /></div>
               <a href="#soldProducts" class="aa">SOLD</a>
            </div>
         </div>
      </div>

      <div class="spinner scroll-down"> <a class="animate" href="#product"></a> </div>
      <div class="up">Scroll Down</div>


      <section id="empty"></section>


      <!-- My Current Products Section -->
      <div class="container1">
         <section class="products" id="product">
            <h1 class="heading1">My Current Products</h1>
            <div class="box-container">
               <?php

               $select_products = mysqli_query($conn, "SELECT * FROM products WHERE userID = '$userID' ");
               if (mysqli_num_rows($select_products) > 0) {
                  while ($fetch_product = mysqli_fetch_assoc($select_products)) {
               ?>

                     <section id="productss" class="productss">
                        <div class="pro-container">
                           <div class="pro" id="pro">
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
                              <form action="" method="post">
                                 <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                 <input type="hidden" name="productID" value="<?php echo $fetch_product['productID']; ?>">
                                 <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                 <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                 <a onclick="javascript:confirmationDelete($(this));return false;" href="inc/deleteProduct.php?id=<?= $fetch_product['id']; ?>" type="submit"><i class="fa-solid fa-trash delete"></i></a>
                                 <a href="inc/editProduct.php?id=<?= $fetch_product['id']; ?>" type="submit"><i class="fa-solid fa-pen edit"></i></a>
                              </form>
                           </div>
                        </div>
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
      <br><br><br><br>










      <!-- Order Sold Popup Section -->
      <div class="containerProducts" id="divOne">
         <section class="checkout-form">
            <h1 class="heading3">Orders Sold</h1>

            <div class="flex">
               <a href="#" class="close">&times;</a>
               <?php
               $total = 0;
               $select_products = mysqli_query($conn, "SELECT * FROM purchases WHERE sellerName = '$userName' ");
               if (mysqli_num_rows($select_products) > 0) { ?>
                  <section id="checkout" class="section-p1">
                     <table width="100%">
                        <thead>
                           <tr>
                              <td class="title">Image</td>
                              <td class="title">Product Name</td>
                              <td class="title">Price</td>
                              <td class="title">Buyer</td>
                              <td class="title">Buyer Phone No</td>
                              <td class="title">Buyer Email</td>
                              <td class="title">Method</td>
                              <td class="title">Status</td>
                              <td class="title">Payment Received</td>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                              $status = $fetch_product['status'];
                           ?>

                              <td><img src="img/products/<?= $fetch_product['image']; ?>" alt="<?= $fetch_product['Pname']; ?>"></td>
                              <td><?= $fetch_product['Pname']; ?></td>
                              <td><span class="rm">RM</span><?= $fetch_product['Price']; ?></td>
                              <?php
                              if ($fetch_product['status'] == "Paid" || $fetch_product['status'] == "paid") {
                                 $total += $fetch_product['Price'];
                              }
                              ?>
                              <td><b><?= $fetch_product['buyerName']; ?></td></b>
                              <td><?= $fetch_product['buyerPhone']; ?></td>
                              <td><?= $fetch_product['buyerEmail']; ?></td>
                              <td class="capital"><?= $fetch_product['paymentMethod']; ?></td>

                              <?php if ($fetch_product['status'] == "not paid") {
                              ?> <td class="notpaid"> <?= $fetch_product['status']; ?></td> <?php
                                                                                          } else {
                                                                                             ?><td class="paid"> <?= $fetch_product['status']; ?></td> <?php
                                                                                                                                                      }
                                                                                                                                                         ?>
                              <?php
                              // Check whether the payment method is Cash on Delivery or Credit Card and if it's paid or not
                              if ($fetch_product['paymentMethod'] == 'cash on delivery') {
                                 if ($fetch_product['status'] == "not paid") {
                              ?>
                                    <!-- If it's Cash on Delivery and Not Paid, a check mark icon will appear so that the seller could click to confirm payment-->
                                    <form action="myProducts.php" method="post">
                                       <td>
                                          <input type="hidden" name="id1" value=" <?php echo $fetch_product['id']; ?>" />
                                          <button type="submit" name="recieve" class="btn-success">
                                             <i class="fa-solid fa-circle-check recieve"></i>
                                          </button>
                                       </td>
                                    <?php
                                 } else {
                                    ?><td class=""></td> <?php
                                                      }
                                                   } else {
                                                      if ($fetch_product['status'] == "not paid") {
                                                         ?><td class=""></td> <?php
                                                                           } else { ?><td class="">Check Your Email</td> <?php
                                                                                                                        }
                                                                                                                     } ?>
                                 </tr>
                                 <?php
                                 if (isset($_POST['recieve'])) {
                                    $id = $_POST['id1'];
                                    $select = "UPDATE purchases SET status = 'Paid' WHERE id ='$id'";
                                    $result = mysqli_query($conn, $select);
                                    echo '<script type="text/javascript">';
                                    echo 'alert("Payment Received Successfully");';
                                    echo 'window.location.href = "myProducts.php"';
                                    echo '</script>';
                                 }
                                 ?>
                              <?php
                           }
                        } else {
                              ?> <h1 class="NoP">Sorry... No Products Sold &#128546;</h1>
                           <?php
                        }
                           ?>
                           <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>
                                 <span class="total">Total Earnings: </span>
                                 <span class="totalPrice"><span class="rm">RM</span><?php echo $total ?></span>
                              </th>
                           </tr>
                        </tbody>
                     </table>
                  </section>
         </section>
      </div>





      <!-- Order Bought Popup Section -->
      <div class="containerProductsBought" id="divTwo">
         <section class="checkout-form">
            <h1 class="heading4">Products Bought</h1>
            <div class="flex">
               <a href="#" class="close">&times;</a>
               <div class="search-box">
               </div>
               <?php
               $bought = 0;
               $select_products = mysqli_query($conn, "SELECT * FROM purchases WHERE buyerName = '$userName' ");
               if (mysqli_num_rows($select_products) > 0) { ?>

                  <section id="bought" class="section-p1">
                     <table width="100%">
                        <thead>
                           <tr>
                              <td class="title">Image</td>
                              <td class="title">Product Name</td>
                              <td class="title">Price</td>
                              <td class="title">Seller</td>
                              <td class="title">Seller Phone No</td>
                              <td class="title">Method</td>
                              <td class="title">Status</td>
                              <td class="title">Pay with Credit Card</td>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                              $status = $fetch_product['status'];
                           ?>

                              <td><img src="img/products/<?= $fetch_product['image']; ?>" alt="<?= $fetch_product['Pname']; ?>"></td>
                              <td><?= $fetch_product['Pname']; ?></td>
                              <td><span class="rm">RM</span><?= $fetch_product['Price']; ?></td>
                              <?php
                              if ($fetch_product['status'] == "Paid" || $fetch_product['status'] == "paid") {
                                 $bought += $fetch_product['Price'];
                              }
                              ?>
                              <td><b><?= $fetch_product['sellerName']; ?></td></b>
                              <td><?= $fetch_product['sellerPhone']; ?></td>
                              <td class="capital"><?= $fetch_product['paymentMethod']; ?></td>

                              <?php if ($fetch_product['status'] == "not paid") {
                              ?> <td><span class="notpaid"> <?= $fetch_product['status']; ?></span></td> <?php
                                                                                                      } else {
                                                                                                         ?><td><span class="paid2"> <?= $fetch_product['status']; ?></span></td> <?php
                                                                                                                                                                              }
                                                                                                                                                                                 ?>
                              <?php
                              // Check whether the payment method is Cash on Delivery or Credit Card and if it's paid or not
                              if ($fetch_product['paymentMethod'] == 'credit card') {
                                 if ($fetch_product['status'] == "not paid") {
                              ?>
                                    <!-- If it's Creidt Card and Not Paid, a credit card icon will appear so that the buyer can pay for the product -->
                                    <form action="payment.php" method="post">
                                       <td>
                                          <input type="hidden" name="productID" value="<?= $fetch_product['productID']; ?>" />
                                          <button type="submit" name="payment" class="btn-success">
                                             <i class="fa-solid fa-credit-card recieve"></i>
                                          </button>
                                       </td>
                                    </form>
                                 <?php
                                 } else {
                                 ?><td class=""></td> <?php
                                                   }
                                                } ?>
                              </tr>
                           <?php
                           }
                        } else {
                           ?> <h1 class="NoP">Sorry... No Products Bought &#128546;</h1>
                        <?php
                        }
                        ?>
                        <tr>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th></th>
                           <th>
                              <span class="total">Total Expeneses: </span>
                              <span class="totalPrice"><span class="rm">RM</span><?php echo $bought ?></span>
                           </th>
                        </tr>
                        </tbody>
                     </table>
                  </section>
         </section>
      </div>



      <!-- Footer Section -->
      <footer id="footer"></footer>



   </body>

   </html>

<?php
} else {
   header('Location: Sign-up Page.php');
   exit();
}
?>