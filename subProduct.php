<?php

//  Session Started to get User Sign-In Data and connect to the database
include "inc\db_conn.php";
session_start();
$user_id1 = $_SESSION['id'];
$userName = $_SESSION['userName'];


// Get the id of the product the user want to view
if (isset($_GET['id'])) {


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
                <link rel="stylesheet" href="Styles/Header.scss">
                <link rel="stylesheet" href="Styles/footer.scss">
                <link rel="stylesheet" href="Styles/sProduct.scss">
                <link rel="stylesheet" href="Styles/Items.scss">
                <script src="jquery-3.6.1.min.js"></script>
                <script src="sweetalert2.all.min.js"></script>
                <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
                <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
                <title>Marketify - View Product</title>
                <script>
                    // To get the header and footer files
                    $(function() {
                        $('#header').load('./assets/php/header.php');
                    })
                    $(function() {
                        $('#footer').load('./assets/php/footer.php');
                    })
                </script>
                <style>
                    /* to style the header and the profile icon */
                    #header .nav-list ul a {
                        background:
                            linear-gradient(90deg, tomato 50%, #000 0) var(--_p, 100%)/200% no-repeat;
                        -webkit-background-clip: text;
                        background-clip: text;
                    }

                    .account {
                        top: 31%;
                    }

                    .account:hover {
                        filter: invert(41%) sepia(66%) saturate(4030%) hue-rotate(353deg) brightness(100%) contrast(101%);
                    }
                </style>
                <script type="text/javascript" src="./script/script.js"></script>
            </head>

            <body>

                <!-- Header Section -->
                <section id="header" class="no2"></section>







                <!-- Product Details Section -->
                <section id="prodetails" class="section-p1 ">
                    <div class="single-image anim">
                        <img src="img/products/<?= $row['image']; ?>" width="100%">
                    </div>

                    <div class="pro-details anim2">
                        <h6><?= $row['userName']; ?></h6>
                        <h4><?= $row['name']; ?></h4>
                        <span><?= $row['description']; ?></span>
                        <h2>
                            <div class="rm">RM</div> <?= $row['price']; ?>
                        </h2>
                        <a href="Products.php#productss"><button class="back">Return&nbsp;</button></a>
                        <a href="checkout.php?id=<?= $row['id']; ?>"><button>Purchase</button></a>
                    </div>
                </section>




                <!-- Footer Section -->
                <footer id="footer"></footer>

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