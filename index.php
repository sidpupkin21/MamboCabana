<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>
    <title><?php echo $settings_r['site_logo'] ?> - HOME </title>
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }
    </style>
</head>

<body>
    <?php
    include('shared/header.php');
    ?>

    <!--HomePage Gallery Swiper (Carousel)-->
    <!-- <div class="container-fluid ">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/outside.jpg" class="w-100 d-block" style=" height:80vh;" />
                </div>
                <div class="swiper-slide">
                    <img src="images/pool.jpg" class="w-100 d-block" style=" height:80vh;" />
                </div>
                <div class="swiper-slide">
                    <img src="images/outside_pool.jpg" class="w-100 d-block" style=" height:80vh;" />
                </div>
                <div class="swiper-slide">
                    <img src="images/outside_pool2.jpg" class="w-100 d-block" style=" height:80vh;" />
                </div>
                <div class="swiper-slide">
                    <img src="images/outside_pool3.jpg" class="w-100 d-block" style=" height:80vh;" />
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                </?php 
                    $res = selectAll('carousel');
                    while($row = mysqli_fetch_assoc($res)){
                        $path = CAROUSEL_IMG_PATH;
                        echo <<<data
                            <div class="swiper-slide">
                                <img src="$path$row[image]" class="w-100 d-block">
                            </div
                        data;
                    }
                ?>
            </div>
        </div>
    </div> -->

</body>

</html>