<?php
require("../admin/db/funcs.php");
adminLogin();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php require('../admin/db/links.php'); ?>
</head>


<body class="bg-white">
    <?php require("../admin/db/header.php"); ?>
    <div class="container-fluid" id="mainContent">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 md-4 overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3>DASHBOARD</h3>
                    <!--PHP CODE-->
                </div>

                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>New Bookings</h6>
                                <h1 class="mt-2 mb-0"></h1>
                                <!--PHP CODE-->
                            </div>
                        </a>
                    </div>

                    <!-- <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>Refund Bookings </h6>
                                <h1 class="mt-2 mb-0"></h1>
                            </div>
                        </a>
                    </div> -->

                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>User Query</h6>
                                <h1 class="mt-2 mb-0"></h1>
                                <!--PHP CODE-->
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-4">
                        <a href="" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h6>Reviews & Ratings</h6>
                                <h1 class="mt-2 mb-0"></h1>
                                <!--PHP CODE-->
                            </div>
                        </a>
                    </div>


                </div>

                <!--Booking Analytics-->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Booking Analytics</h5>
                    <select class="form-select shadow-none bg-light w-auto" onchange="booking_analytics(this.value)">
                        <option value="1">Past 7 Days</option>
                        <option value="2">Past 30 Days</option>
                        <option value="3">Past 90 Days</option>
                        <option value="4">Past 1 Year</option>
                        <option value="5">All</option>
                    </select>
                </div>

                <!--Other Booking details-->
                <div class="row mb-3">
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Total Bookings</h6>
                            <h1 class="mt-2 mb-0" id="total_bookings">0 </h1>
                            <h4 class="mt-2 mb-0" id="total_amount">$0</h4>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Active Bookings</h6>
                            <h1 class="mt-2 mb-0" id="total_bookings">0 </h1>
                            <h4 class="mt-2 mb-0" id="total_amount">$0</h4>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Canelled Bookings</h6>
                            <h1 class="mt-2 mb-0" id="total_bookings">0 </h1>
                            <h4 class="mt-2 mb-0" id="total_amount">$0</h4>
                        </div>
                    </div>
                </div>

                <!--Registration Analytics-->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>User, Queries, Reviews Analytics</h5>
                    <select class="form-select shadow-none bg-light w-auto" onchange="user_analytics(this.value)">
                        <option value="1">Past 7 Days</option>
                        <option value="2">Past 30 Days</option>
                        <option value="3">Past 90 Days</option>
                        <option value="4">Past 1 Year</option>
                        <option value="5">All</option>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>New Registration</h6>
                            <h1 class="mt-2 mb-0" id="total_new_reg">0</h1>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Queries</h6>
                            <h1 class="mt-2 mb-0" id="total_queries">0</h1>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Reviews</h6>
                            <h1 class="mt-2 mb-0" id="total_reviews">0</h1>
                        </div>
                    </div>
                </div>

                <h5>Users</h5>
                <div class="row mb-3">
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-info p-3">
                            <h6>Total</h6>
                            <h1 class="mt-2 mb-0"></h1>
                            <!--?php echo $current_users[''] ?>-->
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>Active</h6>
                            <h1 class="mt-2 mb-0"></h1>
                            <!--?php echo $current_users[''] ?>-->

                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-warning p-3">
                            <h6>Inactive</h6>
                            <h1 class="mt-2 mb-0"></h1>
                            <!--?php echo $current_users[''] ?>-->

                        </div>
                    </div>

                    <!-- <div class="col-md-3 mb-4">
                        <div class="card text-center text-warning p-3">
                            <h6>Unverified</h6>
                            <h1 class="mt-2 mb-0"></h1>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>




    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>