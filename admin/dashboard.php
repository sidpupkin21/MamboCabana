<?php
require("db/funcs.php");
require("db/db_config.php");
adminLogin();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <?php require('../admin/db/links.php'); ?>
</head>


<body class="bg-light">
    <?php require("../admin/db/header.php");

    $is_shutdown = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `shutdown` FROM `settings`"));

    $current_bookings = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT 
    COUNT(CASE WHEN booking_status='booked' THEN 1 END) AS `new_bookings`,
    COUNT(CASE WHEN booking_status='pending' THEN 1 END) AS `pending_bookings`,
    COUNT(CASE WHEN booking_status='cancelled' THEN 1 END) AS `cancelled_bookings`
    FROM `booking_order`"
    ));

    $unread_queries = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT COUNT(sr_no) AS `count` FROM `user_query` WHERE `seen`=0"
    ));

    $unread_reviews = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT COUNT(sr_no) AS `count` FROM `rating_review` WHERE `seen`=0"
    ));

    $current_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
    COUNT(id) as`total`,
    COUNT(CASE WHEN `status`=1 THEN 1 END) AS `active`,
    COUNT(CASE WHEN `status`=0 THEN 1 END) AS `inactive`,
    COUNT(CASE WHEN `is_verified`=0 THEN 1 END) AS `unverified`
    FROM `user`"));
    ?>
    <div class="container-fluid" id="mainContent">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 md-4 overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3>DASHBOARD</h3>
                    <?php
                    if ($is_shutdown['shutdown']) {
                        echo <<<data
                                <h6 class="badge bd-danger py-2 px-3 rounded">Shutdown Mode is Active!</h6>
                            data;
                    }
                    ?>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <a href="bookingNew.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h4>New Bookings</h4>
                                <h2 class="mt-2 mb-0">
                                    <?php
                                    echo $current_bookings['new_bookings']
                                    ?>
                                    ||
                                    <?php
                                    echo $current_bookings['pending_bookings']
                                    ?>
                                </h2>
                                <h6>Confirmed || Pending
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="userQuery.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h4>User Query</h4>
                                <h1 class="mt-2 mb-0">
                                    <?php echo $unread_queries['count'] ?>
                                </h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4">
                        <a href="ratingReview.php" class="text-decoration-none">
                            <div class="card text-center text-success p-3">
                                <h4>Reviews & Ratings</h4>
                                <h1 class="mt-2 mb-0">
                                    <?php echo $unread_reviews['count'] ?>
                                </h1>
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
                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Total Bookings</h6>
                            <h1 class="mt-2 mb-0" id="total_bookings">0 </h1>
                            <h4 class="mt-2 mb-0" id="total_amt">$0</h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Active Bookings</h6>
                            <h1 class="mt-2 mb-0" id="active_bookings">0 </h1>
                            <h4 class="mt-2 mb-0" id="active_amt">$0</h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Cancelled Bookings</h6>
                            <h1 class="mt-2 mb-0" id="cancelled_bookings">0</h1>
                            <h4 class="mt-2 mb-0" id="cancelled_amt">$0</h4>
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

                <div class="row mb-4">
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>New Registration</h6>
                            <h1 class="mt-2 mb-0" id="total_new_reg">0</h1>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Queries</h6>
                            <h1 class="mt-2 mb-0" id="total_queries">0</h1>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-primary p-3">
                            <h6>Reviews</h6>
                            <h1 class="mt-2 mb-0" id="total_reviews">0</h1>
                        </div>
                    </div>
                </div>

                <h5>Users</h5>
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-info p-3">
                            <h6>Total</h6>
                            <h1 class="mt-2 mb-0">
                                <?php echo $current_users['total'] ?>
                            </h1>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-success p-3">
                            <h6>Active</h6>
                            <h1 class="mt-2 mb-0">
                                <?php echo $current_users['active'] ?>

                            </h1>

                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-warning p-3">
                            <h6>Inactive</h6>
                            <h1 class="mt-2 mb-0">
                                <?php echo $current_users['inactive'] ?>
                            </h1>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-danger p-3">
                            <h6>Unverified</h6>
                            <h1 class="mt-2 mb-0">
                                <?php echo $current_users['unverified'] ?>
                            </h1>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <?php require("db/scripts.php"); ?>
    <script src="js/dashboard.js"></script>
</body>

</html>