<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>

    <title><?php echo $settings_r['site_logo'] ?> - BOOKINGS </title>
    <style>
        /* .custom-alert {
        position: fixed;
        top: 20%;
        right: 20px;
        z-index: 9999;
    } */
        .custom-alert {
            position: fixed;
            top: 120px;
            right: 25px;
            z-index: 9999;
        }
    </style>
</head>

<body class="bg-light">
    <?php require('shared/header.php');
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('index.php');
    }
    ?>
    <div class="container">
        <div class="row">

            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">Your Bookings</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">BOOKINGS</a>
                </div>
            </div>

            <?php 
            $query= "SELECT bo.*, bd.* FROM ";
            ?>

        </div>
    </div>






    <?php require('shared/footer.php'); ?>

</body>

</html>