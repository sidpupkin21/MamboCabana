<?php
require("admin/db/db_config.php");
require("admin/db/funcs.php");
date_default_timezone_set("Asia/Dubai");

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('index.php');
}

if (isset($_POST['process_booking'])) {


    $frm_data = filternation($_POST);

    $ORDER_ID = 'ORD_' . $_SESSION['uId'] . random_int(11111, 9999999);
    $CUST_ID = $_SESSION['uId'];
    $COST = $_SESSION['room']['payment'];

    $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) VALUES (?,?,?,?,?)";
    insert($query1, [$CUST_ID, $_SESSION['room']['id'], $frm_data['checkin'], $frm_data['checkout'], $ORDER_ID], 'issss');

    $booking_id = mysqli_insert_id($conn);

    $query2 = "INSERT INTO `booking_details` (`booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phone`, `adult`, `children`) VALUES (?,?,?,?,?,?,?,?)";
    insert($query2, [
        $booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'],
        $COST, $frm_data['name'], $frm_data['phone'], $frm_data['adult'], $frm_data['children']
    ], 'isssssss');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!--CSS Styling-->
    <link rel="stylesheet" href="css/stylesheet.css" />
    <link rel="shortcut icon" href="images/icon/icon.jpeg" type="image/x-icon" />
    <?php $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $settings_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    $settings_r = mysqli_fetch_assoc(select($settings_q, $values, 'i'));

    if ($settings_r['shutdown']) {
        echo <<<alertbar
        <div class='bg-danger text-center p-2 fw-bold'>
          <i class="bi bi-exclamation-triangle-fill"></i>
          BOOKINGS ARE TEMPORARILY DISABLED
          </div>
      alertbar;
    }

    ?>
    <title><?php echo $settings_r['site_logo'] ?> - CONFIRM BOOKING </title>
</head>

<body class="bg-light">
    <?php require('shared/header.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="profile.php" class="text-secondary text-decoration-none">PROFILE</a>
                    <span class="text-secondary"> > </span>
                    <a href="bookings.php" class="text-secondary text-decoration-none">YOUR BOOKINGS</a>
                </div>
                <h1 class="fw-bold">Booking Number ID# <?php echo $ORDER_ID ?> has been submitted</h1>
                <h5>Your booking will be reviewed by our team and you will be contacted shortly regarding its confirmation. 
                    Please check your <a href="bookings.php">Booking</a> page to view/modify/cancel your reservation</h5>
                <p class="text-strong">Reminder: Payments will collected at check-in</p>
            </div>
        </div>
    </div>


    <?php require('shared/footer.php');
    ?>

</body>

</html>