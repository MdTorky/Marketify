<?php
include("Sign-up inc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <title>Registration</title>
</head>

<body>
    <div class="hero">

        <div class=" form-box">
            <div class="img"><img src="img/logo.png"></div>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="sign_up()">Sign-Up</button>
                <button type="button" class="toggle-btn" onclick="sign_in()">Sign-In</button>
            </div>

            <!-- Sign-Up Form -->

            <form id="sign-up" class="input" method="post" action="Sign-up Page.php" enctype="multipart/form-data">
                <input type="text" class="input-field" placeholder="Username" name="UserID" id="UserID" value="<?php echo $UserID; ?>" required>
                <?php if (isset($UserID_error)) :  ?>
                    <p class="error"><?php echo $UserID_error; ?></p>
                <?php endif ?>
                <input type="text" class="input-field" placeholder="Full Name" name="fname" id="fname" value="<?php echo $fname; ?>" required>
                <?php if (isset($fname_error)) :  ?>
                    <p class="error"><?php echo $fname_error; ?></p>
                <?php endif ?>
                <input type="email" class="input-field" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" required>
                <?php if (isset($email_error)) :  ?>
                    <p class="error"><?php echo $email_error; ?></p>
                <?php endif ?>
                <input type="text" class="input-field" placeholder="Phone No" name="phoneNo" id="phoneNo" value="<?php echo $phoneNo; ?>" required>
                <?php if (isset($phone_error)) :  ?>
                    <p class="error"><?php echo $phone_error; ?></p>
                <?php endif ?>


                <input type="password" class="input-field" placeholder="Password" name="password" id="password">
                <i class="far fa-eye" id="togglePassword"></i>
                <?php if (isset($pass_error)) :  ?>
                    <p class="error"><?php echo $pass_error; ?></p>
                <?php endif ?>
                <?php if (isset($success)) :  ?>
                    <p class="error2"><?php echo $success; ?></p>
                <?php endif ?>

                <input type="checkbox" class="check" required><span class="terms">I agree to the <a href="terms.html" class="conditions">Terms & Conditions</a></span>
                <button type="submit" class="sbtn" name="sign-up">Sign-Up</button>
            </form>




            <!-- Sign-In Form -->

            <form id="sign-in" class="input" method="post" action="Sign-in inc.php">
                <input type="text" class="input-field" placeholder="Username" name="sUserID" id="sUserID" required>

                <i class="far fa-eye" id="sign_inP"></i>
                <input type="password" class="input-field" placeholder="Password" name="spassword" id="spassword" required>
                <small>aaaaaaaaaaaaaaaaaaa</small>
                <button type="submit" class="sbtn" name="sign-in">Sign-In</button>
                <?php if (isset($_GET["error"])) { ?>
                    <p class="error1"><?php echo $_GET["error"]; ?></p>
                <?php } ?>
            </form>
        </div>
    </div>


    </script>

    <script>
        // Eye Shape for Showing and Hiding the Password

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.getElementById("password");
        togglePassword.addEventListener('click', function(e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        const sign_inP = document.querySelector('#sign_inP');
        const spassword = document.querySelector("#spassword");
        sign_inP.addEventListener('click', function(e) {
            const type = spassword.getAttribute('type') === 'password' ? 'text' : 'password';
            spassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });


        // Buttons to choose between Sign-Up and Sign-In


        var x = document.getElementById("sign-up");
        var y = document.getElementById("sign-in");
        var z = document.getElementById("btn");

        function sign_in() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function sign_up() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>

</body>

</html>