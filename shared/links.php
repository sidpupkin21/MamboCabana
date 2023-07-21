<!DOCTYPE html>
<html lang="en">
<head>
<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Iconify-->
  <!--Swiper.js-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <!--Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;1000&family=Pacifico&display=swap" rel="stylesheet">
  <!--CSS Styling-->
  <link rel="stylesheet" href="css/stylesheet.css" />
  <link rel="shortcut icon" href="images/icon/icon.jpeg" type="image/x-icon"/>

</head>

<body>
  <!--Scripts-->
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c8c1f4e6df.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script src="js/script.js"></script>
  <script>
    // var swiper = new Swiper(".mySwiper", {
    //   spaceBetween: 30,
    //   centeredSlides: true,
    //   effect: "fade",
    //   loop: true,
    //   autoplay: {
    //     delay: 4000,
    //     disableOnInteraction: false,
    //   },
    // });
  </script>

  <?php
    session_start();
    date_default_timezone_get();

    require('admin/db/db_config.php');
    require('admin/db/funcs.php');

    // $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $settings_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    //$contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    $settings_r = mysqli_fetch_assoc(select($settings_q, $values, 'i'));

    if($settings_r['shutdown']){
      echo <<<alertbar
        <div class='bg-danger text-center p-2 fw-bold'>
          <i class="bi bi-exclamation-triangle-fill"></i>
          BOOKINGS ARE TEMPORARILY DISABLED
          </div>
      alertbar;
    }

?>
  </body>
</html>