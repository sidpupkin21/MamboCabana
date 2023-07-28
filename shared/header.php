 <!--NavBar
TODO: NAV LINKS & Background
navbar bg-body-tertiary fixed-top-->
<nav class="navbar bg-body-tertiary fixed-top bg-light px-lg-3 py-lg-2 shadow-none sticky-top rounded">
    <div class="container-fluid bg-white">
      <a class="navbar-brand"><img src="images/logo/main.jpeg" width="250"  height="100"/></a>
      <div class="d-flex">
        <button class="btn btn-outline-success shadow me-4 btn-md">Reserve</button>
        <button class="btn btn-outline-dark shadow-none me-0 btn-md" data-bs-toggle="modal" data-bs-target="#loginModal">
          Login
        </button>
        <button class="btn btn-outline-secondary shadown-none me-0 btn-md" data-bs-toggle="modal" data-bs-target="#signupModal">
          Signup
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                Rooms & Suites
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="room_details.php?id=1">King Room</a></li>
                <li><a class="dropdown-item" href="room_details.php?id=9">Deluxe Double Room + Balcony</a></li>
                <li><a class="dropdown-item" href="room_details.php?id=10">Deluxe Double Room</a></li>
                <li><a class="dropdown-item" href="room_details.php?id=8">Family Double Room</a></li>
                <li><a class="dropdown-item" href="room_details.php?id=7">Budget Double Room</a></li>
                <li><a class="dropdown-item" href="rooms.php">View All</a></li>
            </li>
          </ul>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="activity.php">Activities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="facilities.php">Facilities</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="activityLocationTips.php">Activities & Location & Tips</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="clientReviews.php">Client Reviews</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin/index.php">Admin</a>
          </li>
        </div>
      </div>
    </div>
  </nav>

  <!--LoginModal
TODO: still needs work-->
  <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <iconify-icon icon="line-md:account-small" width="40" height="40"></iconify-icon> Login
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control shadow-none">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control shadow-none">
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <button type="submit" class="btn btn-success shadown-none">
                LOGIN
                <iconify-icon icon="carbon:login" rotate="90deg"></iconify-icon>
              </button>
              <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--SignupModal
TODO: still needs work-->
  <div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <iconify-icon icon="line-md:account-add" width="40" height="40"></iconify-icon> CREATE A NEW ACCOUNT
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">
                    First Name
                  </label>
                  <input type="text" class="form-control shadow" />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">
                    Last Name
                  </label>
                  <input type="text" class="form-control shadow" />
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">
                    Email Address
                  </label>
                  <input type="email" class="form-control shadow" />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">
                    Phone Number
                  </label>
                  <input type="tel" class="form-control shadow" />
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">
                    Password
                  </label>
                  <input type="password" class="form-control shadow" />
                </div>
                <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">
                    Confirm Password
                  </label>
                  <input type="password" class="form-control shadow" />
                </div>

              </div>
            </div>
            <div class="text-center mb-3">
              <button type="submit" class="btn btn-success shadown-none">REGISTER
                <iconify-icon icon="ion:create-outline" width="20" height="20"></iconify-icon>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- </body>
</html> -->