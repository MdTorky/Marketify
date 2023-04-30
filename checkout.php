<?php

//  Session Started to get User Sign-In Data and connect to the database
include "inc\db_conn.php";
session_start();



// Check if the user Signed in or not
if (isset($_GET['id']) &&  isset($_SESSION['id']) && isset($_SESSION['userID'])) {

    $user_id1 = $_SESSION['id'];
    $userName = $_SESSION['userName'];
    $user_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="Styles/checkout.scss">
                <link rel="stylesheet" href="Styles/footer.scss">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
                <script src="jquery-3.6.1.min.js"></script>
                <script src="sweetalert2.all.min.js"></script>
                <title>Checkout - <?= $row["name"] ?>/RM<?= $row["price"] ?> </title>
                <script>
                    function did() {
                        swal.fire({
                            title: "Address",
                            text: "Jalan ImanJ ohor Bahru, Johor 81310",
                            imageUrl: 'img/icons/location-dot-solid.png'
                        });
                    }

                    function did2() {
                        swal.fire({
                            title: "Phone",
                            text: "+601121792872",
                            imageUrl: 'img/icons/phone-solid.png',
                        });
                    }

                    function did3() {
                        swal.fire({
                            title: "Email",
                            text: "marketify.utm@gmail.com",
                            imageUrl: 'img/icons/envelope-solid.png'
                        });
                    }

                    function did4() {
                        swal.fire({
                            title: "Hours",
                            text: "10:00 - 18:00, Sun - Thurs",
                            imageUrl: 'img/icons/clock-solid.png'
                        });
                    }
                </script>
            </head>

            <body>


                <!-- Header Section -->
                <section id="header">
                    <div class="header container2" style="margin-left: 60px;">
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
                                    <li><a href="products.php" data-after="About"><span class="navbar">Products</span></a></li>
                                    <li><a href="Sell.php" data-after="Contact"><span class="navbar">Sell</span></a></li>
                                    <li>
                                        <div class="dropdown"><button class="dropbtn"><span class="account">
                                                    <img src="img\ProfileIcon.png" width="45px" height="45px" onclick="parent.location='profile.php'"></span>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>




                <!-- Checkout Header Section -->
                <section id="stay">
                    <div class="containerH">
                        <h1>Checkout</h1>
                    </div>
                    <h2>Pay here!</h2>
                </section>





                <!-- Checkout Table Section -->
                <section id="checkout" class="section-p1">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td class="title">Image</td>
                                <td class="title">Product Name</td>
                                <td class="title">Price</td>
                                <td class="title">Seller</td>
                                <td class="title">Seller's Phone No</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="./img/products/<?= $row['image']; ?>" alt="Hello"></td>
                                <td><?= $row['name']; ?></td>
                                <td><span class="rm">RM</span><?= $row['price']; ?></td>
                                <td><?= $row['userName']; ?></td>
                                <td><?= $row['userPhone']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <div class="wrapper">
                    <div class="link_wrapper">
                        <a href="#divOne" class="check">Checkout</a>
                        <div class="icon">
                            <svg class="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                                <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z" />
                            </svg>
                        </div>
                    </div>

                </div>

                <div class="wrapper2">
                    <div class="link_wrapper2">
                        <a href="Products.php#products" class="check2">Back</a>
                        <div class="icon2">
                            <svg class="svg2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                                <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z" />
                            </svg>
                        </div>
                    </div>

                </div>





                <!-- Checkout Popup Form Section -->
                <div class="container" id="divOne">
                    <section class="checkout-form">
                        <h1 class="heading3">Complete your order</h1>
                        <form action="inc/checkoutConfirm.php" method="post">
                            <div class="flex">
                                <a href="#" class="close">&times;</a>
                                <div class="inputBox">
                                    <span>Your Name</span>
                                    <i class="fa-solid fa-signature card"></i>
                                    <input type="text" value="<?= $_SESSION['userName'] ?>" name="buyerName" readonly required>
                                    <input type="hidden" value="<?= $_SESSION['userID'] ?>" name="userid" required>
                                    <input type="hidden" value="<?= $row['productID'] ?>" name="productID" required>
                                    <input type="hidden" value="img/products/<?= $row['image']; ?>" name="p_image">
                                </div>
                                <div class="inputBox">
                                    <span>Your Number</span>
                                    <i class="fa-solid fa-phone card"></i>
                                    <input type="number" value="<?= $_SESSION['userPhone'] ?>" name="number" readonly required>
                                </div>
                                <div class="inputBox">
                                    <span>Your Email</span>
                                    <i class="fa-solid fa-envelope card"></i>
                                    <input type="email" value="<?= $_SESSION['userEmail'] ?>" name="email" readonly required>
                                </div>
                                <div class="inputBox">
                                    <span>Payment Method</span>
                                    <i class="fa-solid fa-credit-card card"></i>
                                    <select name="method">
                                        <option value="cash on delivery" selected>Cash on delivery</option>
                                        <option value="credit card">Credit card</option>
                                    </select>
                                </div>
                                <div class="inputBox">
                                    <span>Address</span>
                                    <i class="fa-solid fa-map-location-dot card"></i>
                                    <input type="text" value="<?= $_SESSION['userAddress'] ?>" name="address" required>
                                </div>
                                <div class="inputBox">
                                    <input type="hidden" value="<?= $row['id'] ?>" name="PID" required>
                                </div>
                                <div class="inputBox">
                                    <span>Product Name</span>
                                    <<i class="fa-solid fa-pizza-slice card"></i>
                                        <input type="text" value="<?= $row['name'] ?>" name="Pname" readonly required>
                                </div>
                                <div class="inputBox">
                                    <span>Price RM</span>
                                    <i class="fa-solid fa-dollar-sign card"></i>
                                    <input type="text" value="<?= $row['price'] ?>" name="Price" readonly required>
                                </div>
                                <div class="inputBox">
                                    <span>Seller</span>
                                    <i class="fa-solid fa-file-signature card"></i>
                                    <input type="text" value="<?= $row['userName'] ?>" name=" Seller" readonly required>
                                </div>
                                <div class="inputBox">
                                    <span>Seller's Phone Number</span>
                                    <i class="fa-solid fa-phone-flip card"></i>
                                    <input type="text" value="<?= $row['userPhone'] ?>" name="SellerPhone" readonly required>
                                </div>
                            </div>
                            <center>
                                <div class="animation">
                                    <button type="submit" name="order_btn" class="order" id="order">
                                        <!-- <a class="order" href="inc/checkoutConfirm.php" type="submit" name="order_btn"> -->
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Submit
                                    </button>
                                </div>
                            </center>
                        </form>
                    </section>
                </div>






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
                                    <li><a href="Contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>About</h4>
                                <ul>
                                    <li><a href="FAQ.php">FAQ</a></li>
                                    <li><a href="AboutUs.php">About Us</a></li>
                                    <li><a href="privacy.html">Privacy Policiy</a></li>
                                    <li><a href="terms.html">Terms & Conditions</a></li>
                                </ul>
                            </div>
                            <div class="footer-col">
                                <h4>Menus</h4>
                                <ul>
                                    <li><a href="Home.php">Home</a></li>
                                    <li><a href="Products.php">Products</a></li>
                                    <li><a href="myProducts.php">My Products</a></li>
                                    <li><a href="sell.php">Sell</a></li>
                                    <li><a href="profile.php">Profile</a></li>
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