<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>
    <link rel="stylesheet" href="css/stylesheet.css" />

    <title><?php echo $settings_r['site_logo'] ?> - HOME </title>

    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        /* .swiper-slide {
            height: 20%;
            width: 30vw;
            object-fit: contain;
        } */
        .swiper-slide {
            height: 50vw;
            /* Set the height to 40% of the viewport height */
            max-width: 100%;
            /* Ensure the slide takes the full width of the swiper container */
            display: flex;
            align-items: center;
            /* Center the image vertically */
            justify-content: center;
            /* Center the image horizontally */
        }

        .swiper-slide img {
            /* max-height: 100%; */
            height: 60vw;
            /* Set the image height to 100% of the parent container (slide) */
            width: auto;
            /* Let the browser automatically calculate the width while maintaining aspect ratio */
        }

        .sub-but {
            align-items: center;
        }


        @media screen and (max-wdith: 716px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }

            .swiper-slide {
                height: 60vw;
                /* width: 40vw; */
            }

            .sub-but {
                align-items: center;
            }

            .mt-5 {
                margin-top: 3;
            }
        }
    </style>
</head>

<body class="bg-light">
    <?php include('shared/header.php'); ?>

    <!-- Home Page Gallery Swiper-->
    <div class="container-fluid bg-white">
        <div class="swiper swiper-container rounded">
            <div class="swiper-wrapper">
                <?php
                $res = selectAll('carousel');
                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                            <div class="swiper-slide">
                                <img src="$path$row[image]" class="w-100 d-block"">
                            </div>
                        data;
                }
                ?>
            </div>
        </div>
    </div>
    <br />
    <!--Check Availablity-->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-light shadow p-4 rounded-top">
                <h3>Find Availability</h3>
                <form>
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">CHECK-IN</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">CHECK-OUT</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 250px;">ADULTS</label>
                            <select class="form-select">
                                <option selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <!-- <select class="form-select shadow-none" name="adult">
                               
                                    //$guests_q = mysqli_query($conn, "SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` FROM `rooms` WHERE `status` ='1' AND `removed` = '0'");
                                    //$guests_res = mysqli_fetch_assoc($guests_q);

                                    //for($i = 1; $i<=$guests_res['max_adult']; $i++){
                                    //    echo "<option value='$i'>$i</option>";
                                   // }
                                
                            </select> -->
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 250px;">CHILDREN</label>
                            <select class="form-select">
                                <option selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <!-- <select class="form-select shadow-none" name="children">
                                
                                //for($i=1;$i<=$guests_res['max_children']; $i++){
                                  //  echo "<option value='$i'>$i</option>";
                                //}
                                
                            </select> -->
                        </div>
                        <input type="hidden" name="check_availability">
                        <div class="col-lg-1 mb-lg-3 mt-5">
                            <button type="submit" class="btn text-white shadow-none custom-bg sub-but">SEARCH </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Room title cards-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TOP RATED ROOMS</h2>
    <div class="h-line bg-dark"></div>
    <div class="container">
        <div class="row">
            <!--King ROOM-->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;" style="width: 20rem;">
                    <img src="images/familyDouble4.jpg" class="card-img-top" />
                    <div class="card-body">
                        <h4 class="card-title fw-bold">KING ROOM</h4>
                        <h6 class="mb-4">$120 per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1 fw-bold">FEATURES</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">1x KING
                                <iconify-icon icon="ion:bed-outline" width="15" height="15"></iconify-icon>
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">50 &#13217;
                                <iconify-icon icon="radix-icons:size" width="15" height="15"></iconify-icon>
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">GARDEN VIEW
                                <iconify-icon icon="guidance:garden"></iconify-icon>
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">POOL VIEW
                                <iconify-icon icon="ph:swimming-pool-thin"></iconify-icon>
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1 fw-bold">FACILITIES</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">AC
                                <iconify-icon icon="streamline:travel-hotel-air-conditioner-heating-ac-air-hvac-cool-cooling-cold-hot-conditioning"></iconify-icon>
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">Balcony
                                <iconify-icon icon="ic:round-balcony"></iconify-icon>
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1 fw-bold">RATING</h6>
                            <!-- <span class="badge rounded-pill"> -->
                            <iconify-icon icon="ic:twotone-star"></iconify-icon>
                            <iconify-icon icon="ic:twotone-star"></iconify-icon>
                            <iconify-icon icon="ic:twotone-star"></iconify-icon>
                            <iconify-icon icon="ic:twotone-star"></iconify-icon>
                            <iconify-icon icon="ic:twotone-star"></iconify-icon>
                            <!-- </span> -->
                        </div>
                    </div>
                    <a href="#" class="btn btn-sm text-white custom-bg shadow-none">VIEW</a>
                </div>
            </div>
            <!--Deluxe Double with Balcony ROOm -->
        </div>

    </div>


    <!--Reach us-->
    <h1 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">FIND US
        <div class="h-line bg-dark"></div>
    </h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-light rounded map-center">
                <iframe class="w-100 rounded" height="500px" src="<?php echo $contact_r['gmap'] ?>" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded-pill mb-4 pop">
                    <h5>CALL US</h5>
                    <?php
                    if ($contact_r['pn1'] != '') {
                        echo <<<data
                            <a href="tel:+$contact_r[pn1]" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> +$contact_r[pn1]
                            </a>
                        data;
                    } ?>
                    <?php
                    if ($contact_r['pn2'] != '') {
                        echo <<<data
                                <a href="tel+$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                                    <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
                                </a>
                            data;
                    }
                    ?>
                </div>
                <div class="bg-white p-4 rounded-pill mb-2 pop align-items-center">
                    <h5>FOLLOW US</h5>
                    <!--Twitter-->
                    <?php
                         if ($contact_r['tw'] != '') {
                            echo <<<data
                                    <a href="$contact_r[tw]" class="d-inline-block mb-3">
                                        <span class="badge bg-white text-dark fs-6 p-2">
                                            <i class="bi bi-twitter me-1"></i>
                                        </span>
                                    </a>
                            data;
                        }
                    if ($contact_r['fb'] != '') {
                        echo <<<data
                                <a href="$contact_r[fb]" class="d-inline-block mb-3">
                                    <span class="badge bg-white text-dark fs-6 p-2">
                                        <i class="bi bi-facebook me-1"></i>
                                    </span>
                                </a>
                        data;
                    }
                    if ($contact_r['ws'] != '') {
                        echo <<<data
                                <a href="$contact_r[ws]" class="d-inline-block mb-3">
                                    <span class="badge bg-white text-dark fs-6 p-2">
                                        <i class="bi bi-whatsapp me-1"></i>
                                    </span>
                                </a>
                        data;
                    }
                    if ($contact_r['bk'] != '') {
                        echo <<<data
                                <a href="$contact_r[bk]" class="d-inline-block">
                                    <span class="badge bg-white text-dark fs-6 p-2">
                                        <i class="bi bi-bootstrap me-1"></i>
                                    </span>
                                </a>
                        data;
                    }
                    if ($contact_r['insta'] != '') {
                        echo <<<data
                                <a href="$contact_r[insta]" class="d-inline-block">
                                    <span class="badge bg-white text-dark fs-6 p-2">
                                        <i class="bi bi-instagram me-1"></i>
                                    </span>
                                </a>
                        data;
                    }
                    ?>

                </div>
                <div class="bg-white p-4 rounded-pill mb-4 pop">
                    <h5>OUR LOCATION</h5>
                    <?php
                    if ($contact_r['address'] != '') {
                        echo <<<data
                            <span class="badge bg-white text-dark fs-6 p-2">
                                $contact_r[address]
                            </span>    
                        data;
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>






    <script src="js/script.js"></script>


</body>
<?php include('shared/footer.php'); ?>

</html>