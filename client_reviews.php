<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>

    <title><?php echo $settings_r['site_logo'] ?> - BOOKINGS </title>
</head>
<body class="bg-light">
    <?php require('shared/header.php');?>

    <div class="container">

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
    <div class="h-line bg-dark"></div>

    <div class="container mt-5">
        <div class="swiper swiper-reviews">
            <div class="swiper-wrapper mb-5">
                <?php 

                $reviews_q = "SELECT rr.*, uc.name AS uname, r.name AS rname 
                FROM `rating_review` rr
                INNER JOIN `user` uc ON rr.user_id = uc.id
                INNER JOIN `rooms` r ON rr.room_id = r.id
                ORDER BY `sr_no` DESC LIMIT 10";

                $review_res = mysqli_query($conn, $reviews_q);
                
                if(mysqli_num_rows($review_res)==0){
                    echo 'No reviews yet';
                }
                else{
                    while($row = mysqli_fetch_assoc($review_res)){
                        $stars = "<i class='bi bi-star-fill text-warning'></i>";
                        for($i=1; $i<$row['rating']; $i++){
                            $stars .="<i class='bi bi-star-fill text-warning'></i>";
                        }
                        echo <<<slides
                            <div class="swiper-slide bg-white p-4">
                                <div class="profile d-flex align-items-center mb-3">
                                    <h6 class="m-0 ms-2">$row[uname]</h6>

                                </div>
                                <h6 class="ms-2">$row[rname]</h6>
                                <p>$row[review]
                                </p>
                                <div class="rating">
                                    $stars
                                </div>
                            </div>
                        slides;
                    }
                }
                
                ?>
        
            </div>
        </div>
    </div>

    </div>

    <?php require('shared/footer.php');?>

    <script>
       var swiper = new Swiper(".swiper-reviews", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "5",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            autoplay:{
                delay:3500,
                disableOnInteraction: false,

            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                }, //320
                640: {
                    slidesPerView: 1,
                }, //128
                768: {
                    slidesPerView: 2,
                }, //256
                1024: {
                    slidesPerView: 3,
                },
                1280:{
                    slidesPerView: 4,
                },
            }
        });
    </script>
</body>
</html>
