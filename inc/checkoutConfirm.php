<?php

include ".\db_conn.php";
session_start();
$user_id1 = $_SESSION['id'];
$userName = $_SESSION['userName'];

if (isset($_POST['order_btn'])) {
    $buyerID = $_POST['userid'];
    $buyerName = $_POST['buyerName'];
    $buyerPhone = $_POST['number'];
    $buyerEmail = $_POST['email'];
    $buyerAddress = $_POST['address'];
    $method = $_POST['method'];
    // $p_image = $_POST['p_image']['name'];
    // $imgContent = addslashes(file_get_contents($p_image));
    // $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    // $p_image_folder = '../img/products/' . $p_image;
    $sellerName = $_POST['Seller'];
    $sellerPhone = $_POST['SellerPhone'];
    $Pname = $_POST['Pname'];
    $price = $_POST['Price'];
    $PID = $_POST['PID'];
    $productID = $_POST['productID'];

    $sign = "INSERT INTO purchases (buyerID, buyerName, buyerEmail, buyerAddress, buyerPhone, paymentMethod, Pname, Price, sellerName, sellerPhone, productID ) 
    VALUES ('$buyerID','$buyerName','$buyerEmail','$buyerAddress', '$buyerPhone', '$method', '$Pname', '$price', '$sellerName', '$sellerPhone',  '$productID')";

    // $sql_query  =  "UPDATE INTO history (image) SELECT image From products WHERE productID = '$productID'";
    mysqli_query($conn, $sign);

    $updateImage = "UPDATE purchases INNER JOIN products
    ON purchases.productID = products.productID
    SET purchases.image = products.image";

    mysqli_query($conn, $updateImage);


    $sql3 = "DELETE FROM products WHERE id='$PID'";
    mysqli_query($conn, $sql3);
}
echo '<script type="text/javascript">';
echo 'alert("Product Bought Successfully, Go to the Bought page to pay for it");';
echo 'window.location.href = "../myProducts.php"';
echo '</script>';

header('Location: ../myProducts.php');
