<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styles/Header.scss">
  <link rel="stylesheet" href="Styles/footer.scss">
  <link rel="stylesheet" href="Styles/contact.scss">
  <script src="jquery-3.6.1.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="canonical" href="http://fontawesome.com/icons/cart-shopping" />
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <title>Marketify - Contact US</title>
  <script>
    // To get the header and footer files
    $(function() {
      $('#header').load('./assets/php/header.php');
    })
    $(function() {
      $('#footer').load('./assets/php/footer.php');
    })
  </script>
  <script type="text/javascript" src="./script/script.js"></script>
</head>

<body>

  <!-- Header Section -->
  <section id="header" class="no"></section>





  <!-- Hero Section -->
  <section id="home">
    <div class="home container">
      <div>
        <h1>Contact <span class="a"> Us</span></h1>
      </div>
    </div>
  </section>






  <!-- Contact Form Section -->
  <section class="contact" id="contact">
    <div class="contact-ctn">
      <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3988.3417247662383!2d103.6406526!3d1.5588533!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1653420846548!5m2!1sen!2seg" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="contact-form">
        <h1>Contact <span class="a">Us</span></h1>
        <form onsubmit="sendEmail(); reset(); return false;">
          <input type="text" name="name" id="name" placeholder="Enter your name" required class="contact-form-txt">
          <input type="email" name="email" id="email" placeholder="Enter your email" required class="contact-form-txt">
          <input type="text" name="subject" id="subject" placeholder="Enter your subject" required class="contact-form-txt">
          <textarea name="message" placeholder="Write your message" id="message" required class="contact-form-txtarea"></textarea>
          <button type="submit" name="contact" class="ctn-btn">Send Message</button>
        </form>
      </div>
    </div>
  </section>


  <!-- Footer Section -->
  <footer id="footer"></footer>




  <script type="text/javascript" src="./script/script.js"></script>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
  <script>
    function sendEmail() {
      Swal.fire(
        'Success!',
        'Email Sent Successfully',
        'success',
      )
    }
  </script>


</body>

</html>