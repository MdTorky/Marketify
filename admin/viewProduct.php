<?php


include "../inc/db_conn.php";
session_start();
$user_id1 = $_SESSION['id'];
$userName = $_SESSION['userName'];



if (isset($_GET['id'])) {


    $user_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE productID='$user_id'";
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
                <link rel="stylesheet" href="viewProduct.scss">
                <script src="jquery-3.6.1.min.js"></script>
                <script src="sweetalert2.all.min.js"></script>
                <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
                <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
                <title>Admin - View Product</title>
            </head>


            <body>

                <div class="side-menu">
                    <div class="brand-logo">
                        <img src="../img/logo.png" class="logo" width="150" alt="">
                    </div>
                    <ul>
                        <a href="admin.php">
                            <li><i class="fa-solid fa-gauge">&nbsp; <span>Dashboard</span></i></li>
                        </a>
                        <a href="payments.php">
                            <li><i class="fa-solid fa-money-bill">&nbsp; <span>Purchases</span> </i></li>
                        </a>
                        <a href="../inc/logout.php">
                            <li><i class="fa-solid fa-right-from-bracket">&nbsp; <span>Logout</span></i></li>
                        </a>
                    </ul>
                </div>


                <div class="container">
                    <div class="header">
                        <div class="nav">
                            <div class="search">

                                <!-- <button type="submit" onclick="myFunction2()"><img src="search.png" alt=""></button> -->
                            </div>
                            <div class="user">
                                <div class="img-case">
                                    <a href="profile.php"> <i class="fa-solid fa-user"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section id="prodetails" class="section-p1 ">
                        <div class="single-image anim">
                            <img src="../img/products/<?= $row['image']; ?>" width="100%">
                        </div>


                        <div class="pro-details anim2">
                            <h6><?= $row['userName']; ?></h6>
                            <h4><?= $row['name']; ?></h4>
                            <!-- <h3>Product Details</h3> -->
                            <span><?= $row['description']; ?></span>


                            <h2>
                                <div class="rm">RM</div> <?= $row['price']; ?>
                            </h2>
                            <!-- <a href="Products.php#productss"><button class="back" style="border:none">Return&nbsp;</button></a> -->
                            <a href="inc/deleteProduct.php?id=<?= $row['productID']; ?>"><button style="border:none; background: black;">Delete</button></a>

                        </div>
                    </section>


            </body>

            </html>

<?php
        }
    } else {
        header('Location: ../Sign-up Page.php');
        exit();
    }
}
?>