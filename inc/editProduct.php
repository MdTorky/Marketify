<?php

//  Session Started to get User Sign-In Data and connect to the database
include ".\db_conn.php";
session_start();
$user_id1 = $_SESSION['id'];
$userName = $_SESSION['userName'];


// Get the ID of the Product the user wants to edit
if (isset($_GET['id'])) {


    $user_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $row) {

            if (isset($_POST['update_product'])) {
                $update_p_id = $_POST['update_p_id'];
                $update_p_name = $_POST['update_p_name'];
                $update_p_price = $_POST['update_p_price'];
                $update_p_description = $_POST['update_p_description'];
                $update_p_image = $_FILES['update_p_image']['name'];
                $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
                $update_p_image_folder = '../img/products/' . $update_p_image;

                $update_query = mysqli_query($conn, "UPDATE products SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image', description = '$update_p_description' WHERE id = '$user_id'");
                if ($update_query) {
                    move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
                    echo "
                    <script>
                    alert('Product Updated Successfully');
                    document.location.href = '../myProducts.php';
                    </script>
                    ";
                } else {
                    $message[] = 'product could not be updated';
                    header('location:../myProducts.php');
                }
            }
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../Styles/Items.scss">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
                <script>
                    function did() {
                        swal.fire({
                            title: "Address",
                            text: "Jalan ImanJ ohor Bahru, Johor 81310",
                            imageUrl: '../img/icons/location-dot-solid.png'
                        });
                    }

                    function did2() {
                        swal.fire({
                            title: "Phone",
                            text: "+601121792872",
                            imageUrl: '../img/icons/phone-solid.png',
                        });
                    }

                    function did3() {
                        swal.fire({
                            title: "Email",
                            text: "marketify.utm@gmail.com",
                            imageUrl: '../img/icons/envelope-solid.png'
                        });
                    }

                    function did4() {
                        swal.fire({
                            title: "Hours",
                            text: "10:00 - 18:00, Sun - Thurs",
                            imageUrl: '../img/icons/clock-solid.png'
                        });
                    }
                </script>

                <title>Edit <?= $row['name'] ?> Product</title>


            </head>


            <!-- Body and Header Section -->

            <body class="bodyS">
                <section id="header">
                    <div class="header container">
                        <div class="nav">
                            <div class="logo">
                                <a href="home.php">
                                    <img src="..\img\logo.png" class="logo">
                                </a>
                            </div>
                            <div class="nav-list">
                                <div class="menu">
                                    <div class="bar"></div>
                                </div>
                                <ul>
                                    <li><a href="../home.php" data-after="Home"><span class="navbar">Home</span></a></li>
                                    <li><a href="../products.php" data-after="About"><span class="navbar">Products</span></a></li>
                                    <li><a href="../Sell.php" data-after="Contact"><span class="navbar">Sell</span></a></li>
                                    <li>
                                        <div class="dropdown"><button class="dropbtn"><span class="account">
                                                    <img src="..\img\profileIcon.png" width="45px" height="45px" onclick="parent.location='../profile.php'"></span>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>




                <!-- Edit Form Section -->
                <div class="container">
                    <section id="edit">
                        <form action="" method="post" class="edit-product-form" enctype="multipart/form-data">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <h3>Edit the product</h3>
                            <img src="../img/products/<?= $row['image']; ?>" alt="Hello">
                            <input type="text" name="update_p_name" class="box" value="<?= $row['name']; ?>" required>
                            <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>" class="box" required>
                            <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']; ?>" class="box" required>
                            <input type="number" name="update_p_price" min="0" value="<?= $row['price']; ?>" class="box" required>
                            <textarea rows="4" cols="60" class="box" value="<?= $row['description']; ?>" name="update_p_description" required><?= $row['description']; ?></textarea>
                            <input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg" class="box" value="<?= $row['image']; ?>" required>
                            <input type="submit" value="Update the product" name="update_product" class="editbtn">
                        </form>
                    </section>
                </div>





                <section id="empty"></section>
                <section id="empty"></section>


                <!-- Footer Section -->
                <footer class="footer">
                    <div class="containerF">
                        <div class="row">
                            <div class="footer-col">
                                <h4>Contact</h4>
                                <ul>
                                    <li><a href="#" onclick="did()">Address</a></li>
                                    <li><a href="#" onclick="did2()">Phone</a></li>
                                    <li><a href="#" onclick="did3()">Email</a></li>
                                    <li><a href="#" onclick="did4()">Hours</a></li>
                                    <li><a href="../Contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>About</h4>
                                <ul>
                                    <li><a href="../FAQ.php">FAQ</a></li>
                                    <li><a href="../AboutUs.php">About Us</a></li>
                                    <li><a href="../privacy.html">Privacy Policiy</a></li>
                                    <li><a href="../terms.html">Terms & Conditions</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>Menus</h4>
                                <ul>
                                    <li><a href="../Home.php">Home</a></li>
                                    <li><a href="../Products.php">Products</a></li>
                                    <li><a href="../myProducts.php">My Products</a></li>
                                    <li><a href="../sell.php">Sell</a></li>
                                    <li><a href="../profile.php">Profile</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>follow us</h4>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/profile.php?id=100088505045143&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/MarketifyUTM"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/marketify.utm/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="copyright">Copyright 2022\23 by UTM. All Rights Reserved.<br>Marketify is Powered by D.CSS.©</p>
                </footer>

            </body>

            </html>

<?php
        }
    } else {
        header('Location: Sign-up Page.php');
        exit();
    }
}
?>