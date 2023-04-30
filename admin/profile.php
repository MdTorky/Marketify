<?php

include "../inc\db_conn.php";
session_start();
$user_id = $_SESSION['id'];

if (isset($_POST['update_profile'])) {

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);

    mysqli_query($conn, "UPDATE accounts SET userName = '$update_name', userEmail = '$update_email', userName = '$update_name', userAddress = '$update_address' WHERE id = '$user_id'") or die('query failed');

    echo '<script>alert("Information Updated Successfully");</script>';
}







if (isset($_SESSION['id']) && isset($_SESSION['userID'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="profile.scss">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script type="text/javascript" src="./script/script.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
        <title><?php echo $_SESSION['userName']; ?> - Profile Page</title>
    </head>

    <body>

        <div class="side-menu">
            <div class="brand-logo">
                <img src="../img/logo.png" class="logo" width="150" alt="">
            </div>
            <ul>
                <a href="admin.php">
                    <li><i class="fa-solid fa-gauge">&nbsp; <span>Dashboard</span></i></i></li>
                </a>
                <a href="payments.php">
                    <li><i class="fa-solid fa-money-bill">&nbsp; <span>Purchases</span> </i></li>
                </a>
                <a href="../inc/logout.php">
                    <li><i class="fa-solid fa-right-from-bracket">&nbsp; <span>Logout</span></i></li>
                </a>
            </ul>
        </div>
        <div class="container2">
            <div class="header">
                <div class="nav">
                    <div class="search">
                        <!-- <input type="text" placeholder="Search.."> -->
                        <!-- <button type="submit"><img src="search.png" alt=""></button> -->
                    </div>
                    <div class="user">
                        <div class="img-case">
                            <a href="profile.php"> <i class="fa-solid fa-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

        <div class="update-profile">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM accounts WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $_SESSION = mysqli_fetch_assoc($select);
            }
            ?>


            <form action="" method="post" id="form" class="anim" enctype="multipart/form-data">

                <img src="img/Profile/<?php echo $_SESSION['userImage']; ?>" title="<?php echo $_SESSION['userImage'] ?>" alt="">
                <div class="flex">
                    <div class="inputBox">
                        <span>Admin ID :</span>
                        <input type="text" readonly name="user_ID" value="<?php echo $_SESSION['userID']; ?>" class="box1">

                        <span>Admin Email :</span>
                        <input type="email" name="update_email" value="<?php echo $_SESSION['userEmail']; ?>" class="box1">
                        <br>
                        <span>Admin Address :</span>
                        <input type="text" name="update_address" value="<?php echo $_SESSION['userAddress']; ?>" class="box1">


                    </div>

                    <div class="inputBox">
                        <span>Full Name :</span>
                        <input type="text" name="update_name" value="<?php echo $_SESSION['userName']; ?>" class="box">
                        <span>Admin PhoneNo. :</span>
                        <input type="text" name="update_phone" value="<?php echo  $_SESSION['userPhone']; ?>" class="box">
                        <span>Update Photo: </span>
                        <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg" class="box">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                        <input type="hidden" name="name" value="<?php echo $_SESSION['userName'] ?>">
                    </div>
                    <div>

                    </div>
                </div>
                <div class="tt">
                    <input type="submit" value="Update Profile" name="update_profile" class="btn">
                    <button type="button" class="delete-btn" onclick="history.back(-2)">Go Back</button>
                </div>
            </form>
        </div>





        <script type="text/javascript">
            document.getElementById("image").onchange = function() {
                document.getElementById('form').submit();
            }
        </script>
        <?php
        if (isset($_FILES['image']['name'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $imageName = $_FILES["image"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validateImageExtension = ['jpg', 'png', 'jpeg'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validateImageExtension)) {
                echo "
        <script>
        alert('Invalid Image Extension');
        document.location.href = 'Profile.php';
        </script>
        ";
            } elseif ($imageSize > 12000000) {
                echo "
        <script>
        alert('Image Size is too Large');
        document.location.href = 'Profile.php';
        </script>
        ";
            } else {
                $newImageName = $name . " - " . date("Y-m-d") . " - " . date("h.i.sa");
                $newImageName .= "." . $imageExtension;
                $quer = "UPDATE accounts SET userImage = '$newImageName' WHERE id ='$id'";
                mysqli_query($conn, $quer);
                move_uploaded_file($tmpName, 'img/Profile/' . $newImageName);
                echo "
        <script>
        document.location.href = 'Profile.php';
        </script>
        ";
            }
        }
        ?>
    </body>


    </html>

<?php
} else {
    header('Location: Sign-up Page.php');
    exit();
}

?>