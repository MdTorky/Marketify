<?php


// Start a Session and Incude the Database
session_start();
include "inc\db_conn.php";


//Take the inputs from the Sign-In Form using POST Method
if (isset($_POST['sUserID']) && isset($_POST['spassword'])) {


    function Validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $UserID = Validate($_POST['sUserID']);
    $password = $_POST['spassword'];



    //Check if the Username and Password match with the ones in the Database ---Accounts Table---
    $sql = "SELECT * FROM accounts WHERE userID = '$UserID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['userID'] == $UserID && password_verify($password, $row['userPwd'])) {
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userAddress'] = $row['userAddress'];
            $_SESSION['userEmail'] = $row['userEmail'];
            $_SESSION['userPhone'] = $row['userPhone'];
            $_SESSION['userImage'] = $row['userImage'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['userPwd'] = password_verify($password, $row['userPwd']);

            //If the Username and Password entered are correct it will take the user to Home Page
            //And if the Username and Password are admin it will take the user to the Admin Dashboard
            if ($row['userID'] == "admin" && password_verify($password, $row['userPwd'])) {
                header('Location: admin/admin.php');
            } else {
                header('Location: home.php');
            }
            exit();

            //If the Username and Password entered are incorrect it will display and Error Message
        } else {
            header('Location: Sign-up Page.php?error=Incorrect Information');
            exit();
        }
    } else {
        header('Location: Sign-up Page.php?error=Incorrect Information');
        exit();
    }
} else {
    header('Location: Sign-up Page.php');
    exit();
}
