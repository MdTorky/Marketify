<?php

$sname = "localhost";
$uname = "root";
$password = "";


$conn = mysqli_connect($sname, $uname, $password);


if (!$result1) {
    echo '<script type="text/javascript">';
    echo 'window.location.href = "Sign-up Page.php"';
    echo '</script>';
}

// Create Database called Marketify

$sql = "CREATE DATABASE Marketify";
$result1 = mysqli_query($conn, $sql) or header("Location: Sign-up Page.php" . getenv("HTTP_REFERER"));



echo "Database Marketify created successfully\n";


// Select Database called Marketify

mysqli_select_db($conn, "Marketify");



// Create Accounts Table

$sqla = "CREATE TABLE accounts (
    id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    userID varchar(255)NOT NULL,
    userPwd varchar(255)NOT NULL,
    userEmail varchar(255)NOT NULL,
    userName varchar(255)NOT NULL,
    unique(userID),
    userAddress varchar(255)NOT NULL,
    userPhone varchar(255)NOT NULL,
    userImage varchar(255) NOT NULL
)";
$result = mysqli_query($conn, $sqla) or die(header("Location: Sign-up Page.php" . getenv("HTTP_REFERER")));

if (!$result) {
    echo '<script type="text/javascript">';
    echo 'window.location.href = "Sign-up Page.php"';
    echo '</script>';
}



// Add an admin to the Accounts Table 

$password = $password_hash = password_hash('admin', PASSWORD_DEFAULT);
mysqli_query($conn, "INSERT INTO accounts(userID, userPWD) VALUES ('admin', '$password')");




// Create Products Table

$sql2 = "CREATE TABLE products (
    id int NOT NULL AUTO_INCREMENT,
    productID varchar(255)NOT NULL,
    unique(ProductID),
    PRIMARY KEY(id),
    userID varchar(255)NOT NULL,
    userName varchar(255) NOT NULL,
    userPhone varchar(255)NOT NULL,
    name varchar(255)NOT NULL,
    price int(255)NOT NULL,
    description varchar(255)NOT NULL,
    image varchar(255)NOT NULL

)";
$result2 = mysqli_query($conn, $sql2) or die();





// Create Purchases Table


$sql4 = "CREATE TABLE purchases (
    id int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    sellerName varchar(255) NOT NULL,
    sellerPhone varchar(255)NOT NULL,

    productID varchar(255)NOT NULL,
    unique(ProductID),
    paymentMethod varchar(255) NOT NULL,
    Pname varchar(255)NOT NULL,
    Price int(255)NOT NULL,

    buyerID varchar(255)NOT NULL,
    buyerName varchar(255)NOT NULL,
    buyerPhone varchar(255)NOT NULL,
    buyerAddress varchar(255) NOT NULL,
    buyerEmail varchar(255) NOT NULL,
    image varchar(255)NOT NULL,
    status varchar(100) DEFAULT 'not paid'

)";
$result4 = mysqli_query($conn, $sql4) or die();



// If the Database didn't connect it will show an error message


if (!$conn) {
    echo "ERROR: Could not connect.";
}
