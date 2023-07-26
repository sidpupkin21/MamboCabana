<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <title>Rooms & Suites | Mambo Cabana</title>
  <?php require('shared/links.php'); ?>
</head>

<body>
  <!-- <?php require('shared/header.php'); 
  ?> -->

  <!--Titles-->
  <div class="my-5 px-4">
    <h1 class="fw-bold h-font text-center">OUR ROOMS</h1>
    <div class="h-line bg-dark"></div>
  </div>

  <!--Filter bar-->
  <div class="container">
    <div class="row">
      <!--Filters-->
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ">
        <nav class="navbar navbar-expland-lg navbar-light bg-light rounded shadow">
          <div class="container-fluid flex-lg-column align-items-stretch">
          <h4 class="mt-2">FILTERS</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-expanded="false">
             <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse show" id="filterDropdown">
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 25px;">CHECK AVAILABILITY</h5>
                <label class="form-label" style="font-weight: 500;">CHECK-IN</label>
                <input type="date" class="form-control shadow-none">
                <label class="form-label" style="font-weight: 500;">CHECK-OUT</label>
                <input type="date" class="form-control shadow-none">
                <br />
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-2" style="font-size: 25px;">NUMBER OF GUESTS</h5>
                  <label class="form-label" style="font-weight: 250;">ROOMS</label>
                  <select class="form-select">
                    <option selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <label class="form-label" style="font-weight: 250;">ADULTS</label>
                  <input type="number" class="form-control shadown-gray">

                  <label class="form-label" style="font-weight: 250;">CHILDREN</label>
                  <input type="number" class="form-control shadown-gray">
                </div>
                <br />
                <div class="border bg-light p-3 rounded mb-3">

                  <h5 class="mb-3" style="font-size: 25px;">FACILITIES</h5>
                  <div class="mb-1">
                    <input type="checkbox" id="f1" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f1">KING BED</label> <br />

                    <input type="checkbox" id="f2" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f2">DOUBLE BED</label> <br />

                    <input type="checkbox" id="f3" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f3">SINGLE BED</label> <br />

                    <input type="checkbox" id="f4" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f4">BASSINET</label> <br />

                    <input type="checkbox" id="f5" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f5">BALCONY</label> <br />

                    <input type="checkbox" id="f6" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f6">CITY VIEW</label> <br />

                    <input type="checkbox" id="f7" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f7">GARDEN VIEW</label> <br />

                    <input type="checkbox" id="f8" class="form-check-input shadow-none mb-3">
                    <label class="form-label" style="font-size:medium" for="f8">POOL VIEW</label>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </nav>
      </div>
   
      <!--Room Card-->
      <div class="col-lg-9 col-md-12 px-4">
         <!--ROOM 1-->
        <div class="card mb-4 border -0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src=".." class="img-fluid rounded-start" />

            </div>
            <div class="col-md-5">
              <h5 class="card-title">ROOM TITLE</h5>
              <p class="card-text">ROOM DESCRIPTION</p>
              <p class="card-text"><small class="text-muted">STARTING $000 PER NIGHT</small></p>
            </div>
            
            <div class="col-md-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">BOOK</a>
              <a href="#" class="btn btn-sm btn-outline shadow-none">VIEW</a>

            </div>
          </div>
          <!--ROOM 2-->
          <br/><br/>
          <!-- <div class="card mb-4 border -0 shadow">
          
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-4">
              <img src=".." class="img-fluid rounded-start" />

            </div>
            <div class="col-md-8">
              <h5 class="card-title">ROOM TITLE</h5>
              <p class="card-text">ROOM DESCRIPTION</p>
              <p class="card-text"><small class="text-muted">STARTING $000 PER NIGHT</small></p>
            </div>
             -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <br/>

  <?php 
require("shared/footer.php");?>
</body>

<!--Footer-->

</html>