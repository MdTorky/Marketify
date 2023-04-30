<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Header.scss">
    <link rel="stylesheet" href="Styles/footer.scss">
    <link rel="stylesheet" href="Styles/FAQ.scss">
    <script src="jquery-3.6.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Marketify - FAQ</title>
    <script>
        // To get the header and footer files
        $(function() {
            $('#header').load('./assets/php/header.php');
        })
        $(function() {
            $('#footer').load('./assets/php/footer.php');
        })
    </script>

</head>

<body>

    <!-- Header Section -->
    <div class="container2">
        <section id="header"></section>
    </div>



    <!-- FAQ Section -->
    <div class="body">
        <div class="container">
            <h1 class="title">
                Frequenty Asked Questions
            </h1>
            <main class="accordion">
                <div class="faq-img">
                    <img src="img/faq.svg" alt="" class="accordion-img">
                </div>
                <div class="content-accordion">
                    <div class="question-answer">
                        <div class="question">
                            <h3 class="title-question">
                                Why do I need to sign in?
                            </h3>
                            <button class="question-btn">
                                <span class="up-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                                <span class="down-icon">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </button>
                        </div>
                        <div class="answer">
                            <p>So that you can view all of your purchases and sold products in one page. Additionally,
                                you won't need to fill out the form each time
                                you want to make a purchase because your sign-in information will fill it out automatically.</p>
                        </div>
                    </div>
                    <div class="question-answer">
                        <div class="question">
                            <h3 class="title-question">
                                Why do we need to add a phone number?
                            </h3>
                            <button class="question-btn">
                                <span class="up-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                                <span class="down-icon">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </button>
                        </div>
                        <div class="answer">
                            <p>So that the seller and customer may interact in the event of a cash on delivery payment option or an issue with the product.</p>
                        </div>
                    </div>
                    <div class="question-answer">
                        <div class="question">
                            <h3 class="title-question">
                                How do I add a Payment Method?
                            </h3>
                            <button class="question-btn">
                                <span class="up-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                                <span class="down-icon">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </button>
                        </div>
                        <div class="answer">
                            <p>You don't need to save a payment method in your account, but if you wish to buy
                                something with a credit card, you will be sent to a page where you can input
                                the details and complete the transaction.</p>
                        </div>
                    </div>
                    <div class="question-answer">
                        <div class="question">
                            <h3 class="title-question">
                                What kind of products can the seller sell?
                            </h3>
                            <button class="question-btn">
                                <span class="up-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                                <span class="down-icon">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </button>
                        </div>
                        <div class="answer">
                            <p>The product must be suitable and in functioning order for the vendor to sell it, and food must not be expired.</p>
                        </div>
                    </div>
                    <div class="question-answer">
                        <div class="question">
                            <h3 class="title-question">
                                What happens if the customer didn't pay?
                            </h3>
                            <button class="question-btn">
                                <span class="up-icon">
                                    <i class="fas fa-chevron-up"></i>
                                </span>
                                <span class="down-icon">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </button>
                        </div>
                        <div class="answer">
                            <p>The buyer and seller will exchange at the agreed-upon location if the payment method is cash on delivery,
                                but if it is credit card, the system keeps track of every transaction made, and if the buyer didn't pay
                                on time, it will fine the customer and attach it to their phone number.
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>






    <!-- Footer Section -->
    <footer id="footer"></footer>
    <script type="text/javascript" src="./script/script.js"></script>
</body>

</html>