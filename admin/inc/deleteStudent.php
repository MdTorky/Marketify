<?php
include "../../inc/db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM accounts WHERE userID='$id'";
    $result = mysqli_query($conn, $sql);

    $sql2 = "DELETE FROM products WHERE userID = '$id'";
    $result2 = mysqli_query($conn, $sql2);

    echo '<script type="text/javascript">';
    echo 'alert("Account Deleted Successfully");';
    echo 'window.location.href = "../admin.php"';
    echo '</script>';
}
