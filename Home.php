<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Header.scss">
    <link rel="stylesheet" href="Styles/footer.scss">
    <link rel="stylesheet" href="Styles/Home.scss">
    <link rel="stylesheet" href="Styles/Items.scss">
    <script src="jquery-3.6.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Marketify - Home</title>
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



    <!-- Background and Hero Seciton -->
    <section id="hero">
        <h4 class="anim">Buy-Sell-Benefit</h4>
        <h1 class="anim">Shop With US</h1>
        <a href="Products.php" class="anim"><button>Shop Now</button></a>
    </section>




    <!-- Services/Features Section -->
    <h2 class="section-heading">Our Services</h2>
    <section id="feature">

        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <h3>SAVE MONEY</h3>
                    <p>
                        Money speaks only one language
                        "If you save me today, I will save you tomorrow"
                    </p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-mobile"></i>
                    </div>
                    <h3>ORDER ONLINE</h3>
                    <p>
                        You can buy any product online. How easy is that?
                    </p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="icon-wrapper">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <h3>24/7 SUPPORT</h3>
                    <p>
                        To keep a customer demands as much skill as to win one
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- Who Are We/About Us Section -->
    <section id="banner" class="section-m1">
        <h4>Who Are We?</h4>
        <h2><span class="market">Marketify</span> is a shopping portal dedicated to UTM students and faculty.</h2>
        <a href="AboutUS.php"><button class="learn-more">
                <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                </span>
                <span class="button-text">Learn More</span>
            </button></a>
    </section>




    <!-- Categories Section -->
    <section id="smbanner" class="section-p1">
        <div class="banner-box">
            <h4>Wear clothes that tell a real story.</h4>
            <h2>CLOTHING</h4>
        </div>

        <div class="banner-box banner-box2">
            <h4>A satisfied customer is the best business strategy.</h4>
            <h2>APPLIANCES</h2>
        </div>
    </section>

    <section id="banner2">
        <div class="banner-box">
            <h4>Success is the sum of small efforts, repeated day in and day out.</h4>
            <h2>STUDY MATERIALS</h2>
        </div>

        <div class="banner-box banner-box2">
            <h4>Good food is the foundation of happiness.</h4>
            <h2>FOOD</h2>
        </div>

        <div class="banner-box banner-box3">
            <h4>Ambition is the path to success. Persistence is the vehicle you arrive in.</h4>
            <h2>VEHICLES</h2>
        </div>
    </section>



    <!-- Newsletter Section -->
    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign Up for Newsletter</h4>
            <p>Get E-mail updates about the products being sold</p>
        </div>

        <div class="form">
            <input type="text" placeholder="Enter Your Email Address" required>
            <button class="normal" type="submit">Sign Me Up</button>
        </div>
    </section>


    <!-- Footer Section  -->
    <footer id="footer"></footer>

</body>

</html>