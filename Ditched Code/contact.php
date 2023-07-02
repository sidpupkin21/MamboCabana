<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!--Title-->
    <title>Contact Us | Mambo Cabana</title>
    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(2.03);
            transition: all 0.5s;
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
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark" style="width:25%;"></div>
    </div>

    <!--Contact Info-->
    <div class="container">
        <div class="row">
            <!--Info-->
            <div class="col-lg-4 col-md-6 mb-5 px-4 align-items-center">
                <div class="bg-white rounded shadow p-4 pop">
                    <!--EMAIL-->
                    <h5>EMAIL US</h5>
                    <a href="mailto: email@mambocabana.com" class="d-inline-block mb-2 text-decoration-none text-dark pop">
                        <iconify-icon icon="mdi:email-edit-outline"></iconify-icon>
                        email@mambocabana.com
                    </a>
                    <a href="mailto: email2@mambocabana.com" class="d-inline-block mb-2 text-decoration-none text-dark pop">
                        <iconify-icon icon="mdi:email-edit-outline"></iconify-icon>
                        email2@mambocabana.com
                    </a>
                </div>
                <br />
                <!--Telephone-->
                <div class="bg-white rounded shadow p-4 pop">
                    <h5 class="mt-4">CALL US</h5>
                    <a href="tel: +255-776-886-630" class="d-inline-block mb-2 text-decoration-none text-dark pop">
                        <iconify-icon icon="mdi:telephone-outline"></iconify-icon>
                        +255-776-886-630
                    </a>
                    <br />
                    <a href="tel: +971-52-218-1823" class="d-inline-block mb-2 text-decoration-none text-dark pop">
                        <iconify-icon icon="mdi:telephone-outline"></iconify-icon>
                        +971-52-218-1823
                    </a>
                </div>
                <br />
                <!--Socials-->
                <div class="bg-white rounded shadow p-4 pop">
                    <h5 class="mt-4">FOLLOW US</h5>
                    <a href="" class="d-inline-block mb-3 text-dark fs-5 me-2 pop">
                        <iconify-icon icon="line-md:facebook"></iconify-icon>
                        Facebook
                    </a>
                    <br />
                    <a href="" class="d-inline-block mb-3 text-dark fs-5 me-2 pop">
                        <iconify-icon icon="line-md:twitter"></iconify-icon>
                        Twitter
                    </a>
                    <br />
                    <a href="" class="d-inline-block mb-3 text-dark fs-5 me-2 pop">
                        <iconify-icon icon="line-md:instagram"></iconify-icon>
                        Instagram
                    </a>
                </div>
            </div>

            <!--Form-->
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form>
                        <h5>SEND US A MESSAGE</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Name</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Email</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Phone</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Subject</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Message</label>
                            <textarea rows="2" class="form-control shadow-none"></textarea><!--style="resize:none;"-->
                        </div>
                        <button type="submit" class="btn btn-success shadow-none">Send <iconify-icon icon="line-md:email" width="15" height="15"></iconify-icon></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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