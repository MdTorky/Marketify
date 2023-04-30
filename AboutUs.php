<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Header.scss">
    <link rel="stylesheet" href="Styles/footer.scss">
    <link rel="stylesheet" href="Styles/about.scss">
    <script src="jquery-3.6.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Marketify - About US</title>
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
            font-size: 2.5rem;
            font-weight: 500;
            letter-spacing: 0.2rem;
            text-decoration: none;
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            padding: 20px;
            display: block;
            color: #0000;
            background: linear-gradient(90deg, #ff77cd 50%, #000 0) var(--_p, 100%)/200% no-repeat;
            -webkit-background-clip: text;
            background-clip: text;
            transition: .4s;
            text-shadow: 3px 5px 7px rgba(0, 0, 0, 0.6);
        }

        .account:hover {
            position: absolute;
            filter: invert(76%) sepia(42%) saturate(3791%) hue-rotate(286deg) brightness(100%) contrast(102%);
            transform: scale(1.2);
        }
    </style>
    <script type="text/javascript" src="./script/script.js"></script>
</head>

<body>
    <!-- Header Section -->
    <div class="container2">
        <section id="header"></section>


        <!-- Who Are We Section -->
        <div class="content">
            <a href="#aboutus" class="btn anim">About Us</a>
            <h1 class="anim">Who Are We?</h1>
            <p class="anim">Marketify is a retail site designed specifically for UTM students and faculty. It is UTM's most popular shopping platform since it provides simple access to information about all things sold and merchants. Buyers can negotiate lower prices with sellers, and they can also become sellers if they like. Low cost, quick arrival, and real reviews Marketify allows you to buy from anywhere and at any time. We have everything from reference books to meals for sale directly from UTM students and employees to students and staff.</p>

            <div class="icons anim3">
                <div class="icon">
                    <a href="https://www.facebook.com/profile.php?id=100088505045143&mibextid=ZbWKwL"><i class="fab fa-facebook-f"></i></a>
                </div>

                <div class="icon">
                    <a href="https://twitter.com/MarketifyUTM"><i class="fab fa-twitter"></i></a>
                </div>

                <div class="icon">
                    <a href="https://www.instagram.com/marketify.utm/"><i class="fab fa-instagram"></i></a>
                </div>

            </div>

        </div>

        <div class="circle">
        </div>
        <img src="img/logo.png" class="feature-img anim2">
    </div>



    <!-- About US Section -->
    <section id="aboutus">
        <div class="main">
            <h1>About US</h1>

            <div class="box1">
                <div class="profile-card">
                    <div class="img">
                        <div class="left">
                            <img src="img/About us/A.png" width="180px">
                        </div>
                    </div>

                    <div class="caption">
                        <h3>Tee Hui Ying</h3>
                        <p>Biomedical Engineer</p>
                        <h5>Selangor, Malaysia.</h5>
                    </div>
                </div>
            </div>

            <div class="box2"></div>

            <div class="box1">
                <div class="profile-card">
                    <div class="img">
                        <div class="left">
                            <img src="img/About us/B.png" width="180px">
                        </div>
                    </div>

                    <div class="caption">
                        <h3>Jayvinna</h3>
                        <p>Biomedical Engineer</p>
                        <h5>Johor, Malaysia</h5>
                    </div>
                </div>
            </div>

            <div class="box3"></div>

            <div class="box1">
                <div class="profile-card">
                    <div class="img">
                        <img src="img/About us/C.png" width="170px">
                    </div>
                    <div class="caption">
                        <h3>Mohamed Torky</h3>
                        <p>Software Engineer</p>
                        <h5>Alexandria, Egypt</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Quote of the Day Section -->
    <div class="back">
        <div class="box"><i class="fas fa-quote-left fa2"></i>
            <div class="text"><i class="fas fa-quote-right fa1"></i>
                <div>
                    <h3>Quote the day</h3>
                    <p>Try not to become a person of success, but rather try to become a person of value <br> ~<span class="hidden"><b> Albert Einstein</b></span></p>
                </div>
            </div>
        </div>
    </div>







    <!-- Footer Section -->
    <section id="footer"></section>
</body>

</html>