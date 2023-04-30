<?php

//  Session Started to get User Sign-In Data and connect to the database
include "inc\db_conn.php";
session_start();
$user_id = $_SESSION['id'];
$userID = $_SESSION['userID'];

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);

   // Update The Database
   mysqli_query($conn, "UPDATE accounts SET userName = '$update_name', userEmail = '$update_email', userPhone = '$update_phone', userAddress = '$update_address' WHERE id = '$user_id'") or die('query failed');
   mysqli_query($conn, "UPDATE products SET userName = '$update_name', userPhone = '$update_phone' WHERE userID = '$userID'");
   echo '<script>alert("Information Updated Successfully");</script>';
}






// Check if the user Signed in or not
if (isset($_SESSION['id']) && isset($_SESSION['userID'])) {
?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="Styles/Profile.scss">
      <link rel="stylesheet" href="Styles/footer.scss">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <script type="text/javascript" src="./script/script.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
      <title><?php echo $_SESSION['userName']; ?> - Profile Page</title>
      <script>
         $('#footer').load('./assets/php/footer.php');
         $('#header').load('./assets/php/Header.php');
      </script>
   </head>

   <body>
      <!--Header Section-->
      <section id="header">
         <div class="header container">
            <div class="nav">
               <div class="logo">
                  <a href="home.php">
                     <img src="img\logo.png" class="logo">
                  </a>
               </div>
               <div class="nav-list">
                  <div class="menu">
                     <div class="bar"></div>
                  </div>
                  <ul>
                     <li><a href="home.php" data-after="Home"><span class="navbar">Home</span></a></li>
                     <li><a href="Products.php" data-after="About"><span class="navbar">Products</span></a></li>
                     <li><a href="Sell.php" data-after="Contact"><span class="navbar">Sell</span></a></li>
                     <li><a href="inc/logout.php" data-after="Contact"><span class="navbar"><span class="logout">Logout</span></span></a></li>
                     <li>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>




      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
      <div class="update-profile">
         <?php

         // Select the account from the table with the same userID as the signed in account
         $select = mysqli_query($conn, "SELECT * FROM accounts WHERE id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select) > 0) {
            $_SESSION = mysqli_fetch_assoc($select);
         }
         ?>

         <!-- Profile Section-->
         <form action="" method="post" id="form" enctype="multipart/form-data">
            <img src="img/Profile/<?php echo $_SESSION['userImage']; ?>" title="<?php echo $_SESSION['userImage'] ?>" alt="">
            <div class="flex">
               <div class="inputBox">
                  <span>User ID :</span>
                  <input type="text" readonly name="user_ID" value="<?php echo $_SESSION['userID']; ?>" class="box1">

                  <span>Your Email :</span>
                  <input type="email" name="update_email" value="<?php echo $_SESSION['userEmail']; ?>" class="box1">
                  <br>
                  <span>Your Address :</span>
                  <input type="text" name="update_address" value="<?php echo $_SESSION['userAddress']; ?>" class="box1">
               </div>

               <div class="inputBox">
                  <span>Full Name :</span>
                  <input type="text" name="update_name" value="<?php echo $_SESSION['userName']; ?>" class="box">
                  <span>Your PhoneNo. :</span>
                  <input type="number" name="update_phone" value="<?php echo  $_SESSION['userPhone']; ?>" class="box">
                  <span>Update Photo: </span>
                  <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg" class="box">
                  <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                  <input type="hidden" name="name" value="<?php echo $_SESSION['userName'] ?>">
               </div>
            </div>
            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <button type="button" class="delete-btn" onclick="history.back(-2)">Go Back</button>
         </form>
      </div>





      <script type="text/javascript">
         document.getElementById("image").onchange = function() {
            document.getElementById('form').submit();
         }
      </script>
      <?php
      // Image Update Section
      if (isset($_FILES['image']['name'])) {
         $id = $_POST['id'];
         $name = $_POST['name'];

         $imageName = $_FILES["image"]["name"];
         $imageSize = $_FILES["image"]["size"];
         $tmpName = $_FILES["image"]["tmp_name"];

         $validateImageExtension = ['jpg', 'png', 'jpeg'];
         $imageExtension = explode('.', $imageName);
         $imageExtension = strtolower(end($imageExtension));
         if (!in_array($imageExtension, $validateImageExtension)) {
            echo "
        <script>
        alert('Invalid Image Extension');
        document.location.href = 'Profile.php';
        </script>
        ";
         } elseif ($imageSize > 12000000) {
            echo "
        <script>
        alert('Image Size is too Large');
        document.location.href = 'Profile.php';
        </script>
        ";
         } else {
            $newImageName = $name . " - " . date("Y-m-d") . " - " . date("h.i.sa");
            $newImageName .= "." . $imageExtension;
            $quer = "UPDATE accounts SET userImage = '$newImageName' WHERE id ='$id'";
            mysqli_query($conn, $quer);
            move_uploaded_file($tmpName, 'img/Profile/' . $newImageName);
            echo "
        <script>
        document.location.href = 'Profile.php';
        </script>
        ";
         }
      }
      ?>


      <!-- Footer Section -->
      <?php include './assets/php/footer.php'; ?>
   </body>

   </html>

<?php
} else {
   header('Location: Sign-up Page.php');
   exit();
}

?>