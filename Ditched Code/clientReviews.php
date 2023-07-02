<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!--Title-->
    <title>Reviews | Mambo Cabana</title>
    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

    <?php require('shared/links.php') ?>

</head>

<body>
    <?php
    include('shared/header.php');
    ?>

    <!--Page Heading title+ description-->
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">REVIEWS</h2>
        <div class="h-line bg-dark" style="width:25%;"></div>

    </div>

    <div class="container-fluid">
        <div class="--swiper-navigation-color: #fff;--swiper-navigation-color: #fff" class="swiper clientSwiper">
        <div class="parallax-bg" style="background-image: url(https://swiperjs.com/demos/images/nature-1.jpg);" data-swiper-parallax="-23%">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="swiper-slide">
                        <div class="title" data-swiper-parallax="-300">Slide 1</div>
                        <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                        <div class="text" data-swiper-parallax="-100">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                                laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                                Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                                Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                                ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                                tincidunt ut libero. Aenean feugiat non eros quis feugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide">
                        <div class="title" data-swiper-parallax="-300">Slide 1</div>
                        <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                        <div class="text" data-swiper-parallax="-100">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                                laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                                Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                                Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                                ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                                tincidunt ut libero. Aenean feugiat non eros quis feugiat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide">
                        <div class="title" data-swiper-parallax="-300">Slide 1</div>
                        <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                        <div class="text" data-swiper-parallax="-100">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                                laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                                Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                                Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                                ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                                tincidunt ut libero. Aenean feugiat non eros quis feugiat.
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
        <script>
            var swiper = new Swiper(".clientSwiper", {
                speed: 600,
                parallax: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>

</body>

<!--Footer-->
<footer class="footer-area section-padding-80-0">
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!--Hotel Information & contact-->
                <div class="col-12 col-sm-6 col-lg-0">
                    <div class="single-footer-widget mb-80">
                        <!--Footer logo goes here-->
                        <a href="#" class="footer-logo">
                            <img str="." />
                            Footer Logo Goes here
                        </a>
                        <h6>+255-776-886-630</h6>
                        <h6>+971-52-218-1823</h6>
                        <span>admin@email.com</span>
                        <span>Address goes here</span>
                    </div>
                </div>

                <!--Widget Area with page links-->
                <div class="col-5 col-sm-4 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <h5 class="widget-title">Links</h5>
                        <ul class="footer-nav">
                            <li style="list-style-type: none;"><a href="rooms.php"><iconify-icon icon="bi:caret-right"></iconify-icon>Rooms & Suites</a></li>
                            <li style="list-style-type: none;"><a href="facilities.php"><iconify-icon icon="bi:caret-right"></iconify-icon>Facilities</a></li>
                            <li style="list-style-type: none;"><a href="activityLocationTips.php"><iconify-icon icon="bi:caret-right"></iconify-icon>Activities & Location & Tips</a></li>
                            <li style="list-style-type: none;"><a href="clientReviews.php"><iconify-icon icon="bi:caret-right"></iconify-icon>Client Reviews</a></li>
                            <li style="list-style-type: none;"><a href="contact.php"><iconify-icon icon="bi:caret-right"></iconify-icon>Contact</a></li>
                        </ul>
                    </div>
                </div>

                <!--Copyright Area-->
                <div class="container">
                    <div class="copywrite-content">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="copywrite-text" style="font-size:25px;">
                                    <p>&copy; Scope Management | All rights reserved</p>
                                </div>
                                <div class="social-info">
                                    <!-- Add Links to socials here -->
                                    <a href="#"><iconify-icon icon="ant-design:facebook-filled"></iconify-icon></a>
                                    <a href="https://www.booking.com/hotel/tz/villa-fiona-marumbi.en-gb.html?aid=304142&label=gen173nr-1FCAEoggI46AdIM1gEaAKIAQGYAQm4ARfIAQzYAQHoAQH4AQyIAgGoAgO4AonIhqQGwAIB0gIkZjJkOGNhNDgtMzlhMi00MDE3LWFlZWYtYTg1YTg2NTI3ZDU42AIG4AIB&sid=bd321b716a00704b5f020c5231bc725b&all_sr_blocks=701788004_288735695_2_42_0;checkin=2023-06-27;checkout=2023-06-28;dest_id=-2568070;dest_type=city;dist=0;group_adults=2;group_children=0;hapos=1;highlighted_blocks=701788004_288735695_2_42_0;hpos=1;matching_block_id=701788004_288735695_2_42_0;no_rooms=1;req_adults=2;req_children=0;room1=A%2CA;sb_price_type=total;sr_order=popularity;sr_pri_blocks=701788004_288735695_2_42_0__8500;srepoch=1686313086;srpvid=17b5567ecd8a0137;type=total;ucfs=1&#hotelTmpl"><iconify-icon icon="tabler:brand-booking"></iconify-icon></a>
                                    <a href="#"><iconify-icon icon="mdi:instagram"></iconify-icon></a>
                                    <a href="#"><iconify-icon icon="mdi:twitter"></iconify-icon></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</footer>


</html>