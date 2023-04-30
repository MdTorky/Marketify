<?php
include "../../inc/db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "DELETE FROM products WHERE productID = '$id'";
    $result2 = mysqli_query($conn, $sql2);

    echo '<script type="text/javascript">';
    echo 'alert("Product Deleted Successfully");';
    echo 'window.location.href = "../admin.php"';
    echo '</script>';
}
