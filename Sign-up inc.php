<?php

// Start a Session and Incude the Database
session_start();
include "inc/db_conn.php";


$UserID     = "";
$fname      = "";
$email      = "";
$phoneNo    = "";
$password   = "";

if (isset($_POST['sign-up'])) {

    // Intializing the Sign-Up Inputs into Variables

    $UserID     = $_POST['UserID'];
    $fname      = $_POST['fname'];
    $email      = $_POST['email'];
    $phoneNo    = $_POST['phoneNo'];
    $password   = $_POST['password'];


    // Check wether the Username, Email, and Phone number are already in the database or not

    $sql_u = "SELECT * FROM accounts WHERE userID = '$UserID'";
    $sql_e = "SELECT * FROM accounts WHERE userEmail = '$email'";
    $sql_p = "SELECT * FROM accounts WHERE userPhone = '$phoneNo'";
    $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
    $res_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
    $res_p = mysqli_query($conn, $sql_p) or die(mysqli_error($conn));


    // Password, Phone, and Full Name Validation

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    $phoneV = preg_match('/^[0-9]{11}+$/', $phoneNo);
    $fnameV = preg_match("/^([a-zA-Z']+)$/", $fname);





    //If Statments to check for errors in validation

    if (mysqli_num_rows($res_u) > 0) {
        $UserID_error = "Sorry!  Username is Already Taken";
    } else if (mysqli_num_rows($res_e) > 0) {
        $email_error = "Sorry!  Email is Already Taken";
    } else if (!$phoneV) {
        $phone_error = "Phone Number must be 11 numbers";
    } else if (mysqli_num_rows($res_p)) {
        $phone_error = "Sorry! Phone Number is Already Taken";
    } else if (!$uppercase) {
        $pass_error = "Password should atleast contain one Uppercase letter";
        echo '<style type="text/css">
        #id-element {
            display: none;
        }
        </style>';
    } else if (!$lowercase) {
        $pass_error = "Password should atleast contain one Lowercase letter";
    } else if (!$number) {
        $pass_error = "Password should atleast contain atleast one Number";
    } else if (!$specialChars) {
        $pass_error = "Password should atleast contain atleast Special Character";
    } else if (strlen($password) < 8) {
        $pass_error = "Password should atleast contain least 8 characters in Length";
    } else if (ctype_alpha(str_replace(' ', '', $fname)) === false) {
        $fname_error = "Invalid Name Given";
    } else {

        //Hash the Password so it can't be known and inserting the validtated inputs into the accounts table

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sign = "INSERT INTO accounts (userID, userPWD, userEmail, userName, userPhone) VALUES ('$UserID','$password_hash','$email','$fname', '$phoneNo')";
        mysqli_query($conn, $sign);
        $success = "Account Created Successfully - Sign-in Now";
    }
}
