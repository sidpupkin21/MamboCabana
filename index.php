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
    <?php require('shared/header.php'); ?>

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
            <?php
            $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` ASC LIMIT 3", [1, 0], 'ii');

            while ($room_data = mysqli_fetch_assoc($room_res)) {
                //features of room
                $fea_q = mysqli_query($conn, "SELECT f.name from `features` f
                INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id = '$room_data[id]'");

                $features_data = "";
                while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                    $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fea_row[name]
                        </span>
                    ";
                }
                //facilities of room
                $fac_q = mysqli_query($conn, "SELECT f.name FROM `facilities` f 
                INNER JOIN `room_facilities` rfac on f.id = rfac.facilities_id
                WHERE rfac.room_id = '$room_data[id]'");

                $facilities_data = "";
                while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                    $facilities_data .= "<span class='badge rounded bg-light text-dark text-wrap me-1 mb-1'>
                    $fac_row[name]
                    </span>";
                }

                //thumbnail image of room
                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpeg";
                $thumb_q = mysqli_query($conn, "SELECT * FROM `room_images`
                WHERE `room_id`='$room_data[id]' AND `THUMB`='1'");

                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }

                $book_btn = "";

                if (!$settings_r['shutdown']) {
                    $login = 0;
                    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                        $login = 1;
                    }
                    $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' 
                    class='btn btn-sm text-white custom-bg shadow-none'>BOOK NOW</button>";
                }

                // $rating_q = "SELECT AVG(rating) AS `avg_rating` FROM `rating_review` WHERE `room_id`=$room_data[id]' ORDER BY `sr_no` DESC LIMIT 20";
                // $rating_res = mysqli_query($conn, $rating_q);
                // $rating_fetch = mysqli_fetch_assoc($rating_res);
                // $rating_data = "";

                // if ($rating_fetch['avg_rating'] != NULL) {
                //     $rating_data = "<div class='rating mb-4'>
                //     <h6 class='mb-1'>Rating</h6>
                //     <span class='badge rounded-pill bg-light'>";

                //     for ($i = 0; $i < $rating_fetch['avg_rating']; $i++) {
                //         $rating_data .= "<i class='bi bi-star-fill text-warning'></i>";
                //     }
                //     $rating_data .= "</span> </div>";
                // } <!--$rating_data goes above button-->

                //display room card
                echo <<<data
                    <div class="col-lg-4 col-mb-6 my-3">
                        <div class="card border-0 shadow" style="max-width:400px; max-height:auto; margin:auto;">
                            <img src="$room_thumb" class="card-img-top">
                            <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6 class="mb-4">$$room_data[price] per night</h6>
                                <h6 class="mb-4">$room_data[area] &#13217;</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    $features_data
                                </div>
                                <div class="facilities mb-4">
                                    <h6 class="mb-1">Facilities</h6>
                                    $facilities_data
                                    
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[adult] Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        $room_data[children] Children
                                    </span>
                                </div>
                                
                                <div class="d-flex justify-content-evenly mb-2">
                                    $book_btn
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-ouline-dark shadown-none">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                data;
            }
            ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
            </div>
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
    <?php require('shared/footer.php'); ?>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>


</body>

</html>