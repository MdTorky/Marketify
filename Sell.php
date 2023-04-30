<?php

//  Session Started to get User Sign-In Data and connect to the database
include "inc\db_conn.php";
session_start();
$user_id = $_SESSION['id'];

// Check if the user Signed in or not
if (isset($_SESSION['id']) && isset($_SESSION['userID'])) {


    if (isset($_POST['add_product'])) {
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = 'img/products/' . $p_image;
        $userID = $_POST['userID'];
        $userName = $_POST['userName'];
        $userPhone = $_POST['userPhone'];
        $productID = uniqid("PR");
        $description = $_POST['description'];

        //Insert image into the accounts table
        $insert_query = mysqli_query($conn, "INSERT INTO `products`(userID, userName, userPhone, name, price, image, productID, description) VALUES('$userID', '$userName', '$userPhone', '$p_name', '$p_price', '$p_image', '$productID', '$description')") or die('query failed');

        if ($insert_query) {
            move_uploaded_file($p_image_tmp_name, $p_image_folder);
            echo "
            <script>
            alert('Product Added Successfully');
            document.location.href = 'myProducts.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Couldn't Add Product');
            document.location.href = 'sell.php';
            </script>
            ";
        }
    };
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Styles/Header.scss">
        <link rel="stylesheet" href="Styles/footer.scss">
        <link rel="stylesheet" href="Styles/Items.scss">
        <script src="jquery-3.6.1.min.js"></script>
        <script src="sweetalert2.all.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <title>Marketify - Sell</title>
        <script>
            // To get the header and footer files
            $(function() {
                $('#header').load('./assets/php/header.php');
            })
            $(function() {
                $('#footer').load('./assets/php/footer.php');
            })
        </script>
        <script type="text/javascript" src="./script/script.js"></script>
    </head>

    <!-- Body and Header Section -->

    <body class="bodyS">
        <section id="header" class="no"></section>




        <!-- Add Product Section -->
        <div class="container">
            <section id="sell">
                <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <h3>Add a new product</h3>
                    <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>" class="box" required>
                    <input type="hidden" name="userName" value="<?php echo $_SESSION['userName']; ?>" class="box" required>
                    <input type="hidden" name="userPhone" value="<?php echo $_SESSION['userPhone']; ?>" class="box" required>
                    <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
                    <textarea rows="4" cols="60" class="box" placeholder="Enter the product description" name="description" required></textarea>
                    <input type="file" placeholder="hello" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                    <input type="submit" value="Add the product" name="add_product" class="btn">
                </form>
            </section>
        </div>



        <section id="empty"></section>
        <section id="empty"></section>




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