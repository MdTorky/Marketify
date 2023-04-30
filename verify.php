<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Verify</title>
</head>


<body>
    <div class="hero">
        <div class="form-box2">
            <div class="headerVerify">
                <h1>HELLO</h1>
                <form autocomplete="off" action="">
                    <div class="error1">Error</div>
                    <div class="fieldsVerify">
                        <input type="number" name="opt1" class="optField" placeholder="0" min="0" max="9" required onpaste="false">
                        <input type="number" name="opt2" class="optField" placeholder="0" min="0" max="9" required onpaste="false">
                        <input type="number" name="opt3" class="optField" placeholder="0" min="0" max="9" required onpaste="false">
                        <input type="number" name="opt4" class="optField" placeholder="0" min="0" max="9" required onpaste="false">
                    </div>
                    <button type="submit" class="sbtnVerify" name="sign-up">Verify</button>
                </form>
            </div>
            <script>
                const otp = document.querySelectorAll('.optField');


                otp[0].focus();

                otp.forEach((field, index) => {

                    field.addEventListener('keydown', (e) => {
                        if (e.key >= 0 && e.key <= 9) {
                            otp[index].value = "";
                            setTimeout(() => {
                                otp[index + 1].focus();
                            }, 4);

                        } else if (e.key === 'Backspace') {
                            setTimeout(() => {
                                otp[index - 1].focus();
                            }, 4);
                        }
                    });
                });
            </script>
</body>


</html>