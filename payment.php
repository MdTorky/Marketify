<?php

//  Session Started to get User Sign-In Data and connect to the database
include "inc\db_conn.php";
session_start();
$buyerID = $_SESSION['id'];
$buyerName = $_SESSION['userName'];

// Check wether the payment button is clicked or not
if (isset($_POST['payment'])) {
    $productID = $_POST['productID'];
    $query = "SELECT * FROM purchases WHERE productID='$productID'";
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
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link rel="stylesheet" href="Styles/payment.scss">
                <link rel="stylesheet" href="Styles/footer.scss">
                <link rel="stylesheet" href="Styles/header.scss">
                <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
                <script src="jquery-3.6.1.min.js"></script>
                <script src="sweetalert2.all.min.js"></script>
                <title>Checkout - <?= $row["productID"] ?></title>
                <script>
                    // To get the footer files
                    $(function() {
                        $('#footer').load('./assets/php/footer.php');
                    })
                </script>
                <style>
                    /* to style the header and the profile icon */
                    #header .nav-list ul a {
                        background:
                            linear-gradient(90deg, #FF5ACD 50%, #000 0) var(--_p, 100%)/200% no-repeat;
                        -webkit-background-clip: text;
                        background-clip: text;
                    }

                    .account {
                        top: 31%;
                    }

                    .account:hover {
                        filter: invert(69%) sepia(77%) saturate(4770%) hue-rotate(291deg) brightness(104%) contrast(101%);
                    }
                </style>
            </head>

            <body>

                <!-- Header Section -->
                <section id="header">
                    <div class="header container2" style="margin-left: 70px">
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
                                                    <img src="img\profileIcon.png" width="45px" height="45px" onclick="parent.location='profile.php'"></span>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>





                <!-- Payment Section -->
                <div class="menu">
                    <button onclick="location.href='#Info'"><i class="fa-solid fa-bars display"></i></button>
                </div>
                <div class="container">
                    <div class="card-container">
                        <div class="front">
                            <div class="image">
                                <img src="img/Payment/chip.png" alt="">
                                <img src="img/Payment/visa.png" alt="" class="visa">
                            </div>
                            <div class="card-number-box">################</div>
                            <div class="flexbox">
                                <div class="box">
                                    <span>card holder</span>
                                    <div class="card-holder-name">full name</div>
                                </div>
                                <div class="box">
                                    <span>expires</span>
                                    <div class="expiration">
                                        <span class="exp-month">mm</span>
                                        <span class="exp-year">yy</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="back">
                            <div class="stripe"></div>
                            <div class="box">
                                <span>cvv</span>
                                <div class="cvv-box"></div>
                                <img src="image/visa.png" alt="">
                            </div>
                        </div>
                    </div>


                    <!-- Payment Form Section -->
                    <form action="payment.php" method="post">
                        <div class="inputBox">
                            <span>Card Number</span>
                            <input type="text" maxlength="16" class="card-number-input" required>
                        </div>
                        <div class="inputBox">
                            <span>Card Holder Name</span>
                            <input type="text" class="card-holder-input" value="<?= $row['buyerName'] ?>" placeholder="<?= $row['buyerName'] ?>" required>
                        </div>
                        <div class="inputBox">
                            <span>Card Holder Email</span>
                            <input type="text" class="card-holder-input" value="<?= $row['buyerEmail'] ?>" placeholder="<?= $row['buyerEmail'] ?>" required>
                        </div>
                        <div class="flexbox">
                            <div class="inputBox">
                                <span>Expiration mm</span>
                                <select name="" id="" class="month-input">
                                    <option value="month" selected disabled>month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="inputBox">
                                <span>Expiration yy</span>
                                <select name="" id="" class="year-input">
                                    <option value="year" selected disabled>year</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                                <input type="hidden" name="productID" value="<?= $row['productID'] ?>">
                            </div>
                            <div class="inputBox">
                                <span>cvv</span>
                                <input type="text" maxlength="4" class="cvv-input">
                            </div>
                        </div>
                        <input type="submit" value="submit" class="submit-btn" name="submit2">
                    </form>
                </div>


                <!-- Product Info Popup -->
                <div class="containerProducts" id="Info">
                    <h1 class="heading3">Current Product</h1>

                    <a href="#" class="close">&times;</a>
                    <div class="box">
                        <div class="imgBx">
                            <img src="./img/products/<?= $row['image'] ?>">
                        </div>
                        <div class="content">
                            <div>
                                <h2><?= $row['Pname'] ?></h2>
                                <p>
                                    Seller: <span class="money"><?= $row['sellerName'] ?></span> <br>Price: Rm <span class="money"><?= $row['Price'] ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Script for the Car Animation -->
                <script>
                    document.querySelector('.card-number-input').oninput = () => {
                        document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
                    }
                    document.querySelector('.card-number-box')

                    document.querySelector('.card-holder-input').oninput = () => {
                        document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
                    }
                    document.querySelector('.month-input').oninput = () => {
                        document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
                    }

                    document.querySelector('.year-input').oninput = () => {
                        document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
                    }
                    document.querySelector('.cvv-input').onmouseenter = () => {
                        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
                        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
                    }
                    document.querySelector('.cvv-input').onmouseleave = () => {
                        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
                        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
                    }
                    document.querySelector('.cvv-input').oninput = () => {
                        document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
                    }
                </script>





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


// A Popup Message 
if (isset($_POST['submit2'])) {
    $productID = $_POST['productID'];
    $select = "UPDATE purchases SET status = 'Paid' WHERE productID ='$productID'";
    $result = mysqli_query($conn, $select);
    echo '<script type="text/javascript">';
    echo 'alert("Product Successfully Bought");';
    echo 'window.location.href = "myProducts.php"';
    echo '</script>';
}
?>