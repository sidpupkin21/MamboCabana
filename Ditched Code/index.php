<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

  <!--Title-->
  <title>Mambo Cabana | Home</title>
  <?php require('shared/links.php')?>

</head>

<body class="bg-light shadow-xl">
 <?php
 include('shared/header.php');
 ?>
  <!--Home Page Gallery Swiper
TODO: change images+ organize folders
Add whatsapp logo to all pages-->
  <div class="container-fluid "> <!--px-lg-4 mt-4-->
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
  </div>

  <!--Check Availability-->
  <div class="container checkAvail rounded">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h3>Find Availability</h3>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-2">
              <label class="form-label" style="font-weight: 500;">CHECK-IN</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-2">
              <label class="form-label" style="font-weight: 500;">CHECK-OUT</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-2">
              <label class="form-label" style="font-weight: 250;">ROOMS</label>
              <select class="form-select">
                <option selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
            <div class="col-lg-2">
              <label class="form-label" style="font-weight: 250;">ADULTS</label>
              <select class="form-select">
                <option selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
            <div class="col-lg-2">
              <label class="form-label" style="font-weight: 250;">CHILDREN</label>
              <select class="form-select">
                <option selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn text-white shadow-none custom-bg btn-sm">
                <iconify-icon icon="basil:search-solid" height="25" width="25"></iconify-icon>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

  <!--Room Card Title-->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TOP RATED ROOMS</h2>
  <div class="h-line bg-dark"></div>

  <!--Room Cards-->
  <div class="container">
    <div class="row">
      <!--King ROOM-->
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card" style="width: 20rem;">
          <img src="images/familyDouble4.jpg" class="card-img-top" style="width: 20rem;" />
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
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card" style="width: 20rem;">
          <img src="images/deluxeDoubleBalcony3.jpg" class="card-img-top" style="height: 20rem;">
          <div class="card-body">
            <h4 class="card-title fw-bold">DELUXE DOUBLE + BALCONY</h4>
            <h6 class="mb-4">$110 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1 fw-bold">FEATURES</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">1x QUEEN
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
      <!--Family Double Room-->
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card" style="width: 20rem;">
          <img src="images/king6.jpg" class="card-img-top" style="width: 20rem;" />
          <div class="card-body">
            <h4 class="card-title fw-bold">FAMILY DOUBLE ROOM</h4>
            <h6 class="mb-4">$115 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1 fw-bold">FEATURES</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">1x KING
                <iconify-icon icon="ion:bed-outline" width="15" height="15"></iconify-icon>
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">1x SINGLE
                <iconify-icon icon="ion:bed-outline" width="15" height="15"></iconify-icon>
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">45 &#13217;
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
    </div>
  </div>

  <!--View Rooms Button-->
  <div class="col-lg-12 text-center mt-5">
    <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">View ALL</a>
  </div>
  <br/><br/>

  <!--Reach us-->
  <h1 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">FIND US      <div class="h-line bg-dark"></div></h1>


  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 map-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15873.917631473863!2d39.35198630790154!3d-5.928447308031739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1842d7a95ffa7f0b%3A0x4f3e26fc476a7ded!2sMambo%20Cabana%20Hotel!5e0!3m2!1sen!2sae!4v1686313928961!5m2!1sen!2sae" height="450" width="600" loading="lazy"></iframe>
      </div>
    </div>
  </div>

  <br/><br/>

  <?php 
  require('shared/footer.php');
  require('shared/links.php')
  ?>
  
</body>

</html>