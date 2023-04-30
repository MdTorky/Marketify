<?php


include "../inc/db_conn.php";
session_start();
$user_id1 = $_SESSION['id'];
$userName = $_SESSION['userName'];
$userpassword = $_SESSION['userPwd'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-logo">
            <img src="../img/logo.png" class="logo" width="150" alt="">
        </div>
        <ul>
            <a href="admin.php">
                <li class="current"><i class="fa-solid fa-gauge">&nbsp; <span class="current">Dashboard</span>&nbsp; <i class="fa-solid fa-arrow-right"></i></i></li>
            </a>
            <a href="payments.php">
                <li><i class="fa-solid fa-money-bill">&nbsp; <span>Purchases</span> </i></li>
            </a>
            <a href="../inc/logout.php">
                <li><i class="fa-solid fa-right-from-bracket">&nbsp; <span>Logout</span></i></li>
            </a>
        </ul>
    </div>


    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">

                    <!-- <button type="submit" onclick="myFunction2()"><img src="search.png" alt=""></button> -->
                </div>
                <div class="user">
                    <!-- <a href="#" class="btn">Add Account</a> -->
                    <!-- <img src="notifications.png" alt=""> -->
                    <div class="img-case">
                        <a href="profile.php"> <i class="fa-solid fa-user"></i></a>
                    </div>
                </div>
            </div>
        </div>





        <?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        $rowcount = mysqli_num_rows($result);
        $query2 = "SELECT * FROM accounts";
        $result2 = mysqli_query($conn, $query2);
        $rowcount2 = mysqli_num_rows($result2);
        ?>






        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?= $rowcount ?></h1>
                        <h3>Products</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?= $rowcount2 - 1 ?></h1>
                        <h3>Accounts</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Products</h2>
                        <div class="search">
                            <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for User's ID" title="Type in a name">
                        </div><!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <table id="myTable2">
                        <tr>
                            <th>Name</th>
                            <th>User ID</th>
                            <th>Phone Number</th>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row['userName']; ?></td>
                                    <td><?php echo $row['userID']; ?></td>
                                    <td><?php echo $row['userPhone']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>RM<?php echo $row['price']; ?></td>
                                    <td><a href="viewProduct.php?id=<?= $row['productID'] ?>" class="btn">View</a></td>
                                    <td><a href="inc/deleteProduct.php?id=<?= $row['productID']; ?>" class=" btn btn2">Delete</a></td>

                            <?php
                            }
                        }
                            ?>
                                </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>Students</h2>
                        <div class="search">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for User's ID" title="Type in a name">
                        </div>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <table id="myTable">
                        <tr>
                            <th>UserID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>

                        </tr>

                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            foreach ($result2 as $row2) {
                                if ($row2['userID'] != "admin") {
                        ?>

                                    <tr>
                                        <td><?php echo $row2['userID']; ?></td>
                                        <td><?php echo $row2['userName']; ?></td>
                                        <td><?php echo $row2['userEmail']; ?></td>
                                        <td><?php echo $row2['userPhone']; ?></td>
                                        <input type="hidden" name="userID" value=" <?php echo $row2['userID']; ?>" />
                                        <!-- <td><a href="#" class="btn">View</a></td> -->
                                        <td><a href="inc/deleteStudent.php?id=<?= $row2['userID']; ?> " class="btn btn2">Delete</a></td>
                            <?php
                                }
                            }
                        }
                            ?>
                                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function myFunction2() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>