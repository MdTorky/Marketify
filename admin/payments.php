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
    <link rel="stylesheet" href="payments.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
    <script src="../jquery-3.6.1.min.js"></script>
    <script src="../sweetalert2.all.min.js"></script>
    <title>Admin - Purchases</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-logo">
            <img src="../img/logo.png" class="logo" width="150" alt="">
        </div>
        <ul>
            <a href="admin.php">
                <li><i class="fa-solid fa-gauge">&nbsp; <span>Dashboard</span></i></li>
            </a>
            <a href="payments.php">
                <li class="current"><i class="fa-solid fa-money-bill">&nbsp; <span class="current">Purchases</span>&nbsp; <i class="fa-solid fa-arrow-right"></i> </i></li>
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
        $query = "SELECT * FROM purchases";
        $result = mysqli_query($conn, $query);
        $rowcount = mysqli_num_rows($result);
        ?>






        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1><?= $rowcount ?></h1>
                        <h3>Purchases</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Purchases Done</h2>
                        <div class="search">
                            <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for Buyer's ID" title="Type in a name">
                        </div><!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <table id="myTable2">
                        <tr>
                            <th>Product Image</th>
                            <th style="color:#f05462;">Seller Name</th>
                            <th style="color:#f05462;">Seller Phone</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Payment Method</th>
                            <th style="color:mediumseagreen;">Buyer ID</th>
                            <th style="color:mediumseagreen;">Buyer Name</th>
                            <th style="color:mediumseagreen;">Buyer Phone</th>
                            <th>Payment Status</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td>
                                        <center><img src="../img/products/<?= $row['image'] ?>" width="80px" style="margin-right:30px;"></center>
                                    </td>
                                    <td><?php echo $row['sellerName']; ?></td>
                                    <td><?php echo $row['sellerPhone']; ?></td>
                                    <td><?php echo $row['Pname']; ?></td>
                                    <td>RM<?php echo $row['Price']; ?></td>
                                    <td style=" text-transform: capitalize;"><?php echo $row['paymentMethod']; ?></td>
                                    <td><?php echo $row['buyerID']; ?></td>
                                    <td><?php echo $row['buyerName']; ?></td>
                                    <td><?php echo $row['buyerPhone']; ?></td>
                                    <?php if ($row['status'] == "Paid") { ?>

                                        <td style="color:mediumseagreen; text-transform: capitalize;"><b><?php echo $row['status']; ?></b></td>

                                    <?php } else { ?>

                                        <td style="color:red; text-transform: capitalize;"><b><?php echo $row['status']; ?></b></td>

                                    <?php } ?>
                                    <!-- <td><a href="#" class="btn">View</a></td> -->
                                    <?php if ($row['status'] == "not paid" && $row['paymentMethod'] == "credit card") { ?>
                                        <td><a href="#" onclick="javascript:fine($(this));return false;" class="btn btn2">Fine</a></td>
                                    <?php } ?>

                            <?php
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
        function myFunction2() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[5, 6];
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

        // function fine() {
        //     var userPreference;

        //     if (confirm("Are you sure you want to fine") == true) {
        //         alert("Fine Sent Successfully!");
        //     } else {
        //         userPreference = "Fine Canceled!";
        //     }

        //     document.getElementById("msg").innerHTML = userPreference;
        // }

        function fine(anchor) {

            Swal.fire({
                type: 'warning',
                title: 'Are You Sure?',
                text: 'Fine will be given to this Student',
                showCancelButton: true,
                customClass: 'swal-wide',
                confirmButtonColor: '#009e60',
                cancelButtonColor: '#ed2939',
                confirmButtonText: 'Fine Student',
            }).then((result) => {
                if (result.value) {
                    window.location = anchor.attr("href");
                }
            })
        }

        const flashdata = $('.flash-data').data('flashdata')
        if (flashdata) {
            Swal.fire({
                type: 'success',
                customClass: 'swal-wide',
                title: 'Success',
                text: 'Fine Sent     Successfully',
            })
        }
    </script>

</body>

</html>