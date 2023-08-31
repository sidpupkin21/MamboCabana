<?php
require("db/funcs.php");
require("db/db_config.php");
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rooms </title>
    <?php require('../admin/db/links.php'); ?>
</head>

<body class="bg-light">
    <?php require("../admin/db/header.php"); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-3">Modify Booking Data</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <input type="text" oninput="get_all_booking(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Search">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Check-In Date</th>
                                        <th scope="col">Check-Out Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="booking-data"></tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Modify Booking Modal-->
    <div class="modal fade" id="modify-booking" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="modify_booking_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">EDIT ROOM</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Check-in </label>
                                <input type="date" id="check_in" name="check_in" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Check-out</label>
                                <input type="date" id="check_out" name="check_out" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <input type="hidden" name="booking_id">
                        <div class="modal-footer">
                            <button type="reset" class="btn text-white btn-danger shadow-none" data-bs-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> -->
    <?php require("db/scripts.php") ?>
    <!-- <script src="js/modify_booking.js"></script> -->
    <script>
        function get_all_booking() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/modify_booking.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                document.getElementById('booking-data').innerHTML = this.responseText;
            }
            xhr.send('get_all_booking');
        }

        window.onload = function() {
            get_all_booking();
        }

        let modify_booking_form = document.getElementById('modify_booking_form');

        function edit_booking(booking_id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/modify_booking.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                let data = JSON.parse(this.responseText);
                modify_booking_form.elements['check_in'].value = data.bookingdata.check_in;
                modify_booking_form.elements['check_out'].value = data.bookingdata.check_out;
                modify_booking_form.elements['booking_id'].value = data.bookingdata.booking_id;
            }
            xhr.send("get_booking=" + booking_id);
        }
        modify_booking_form.addEventListener('submit', function(e) {
            e.preventDefault();
            submit_booking();
        });

        function submit_booking() {
            let data = new FormData();
            data.append('edit_bookings', '');
            data.append('booking_id', modify_booking_form.elements['booking_id'].value);
            data.append('check_in', modify_booking_form.elements['check_in'].value);
            data.append('check_out', modify_booking_form.elements['check_out'].value);

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/modify_booking.php", true);

            xhr.onload = function() {
                var myModal = document.getElementById('modify-booking');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
                if (this.responseText == 1) {
                    // showAlert('success', 'Booking Updated');
                    updateTotalPay(modify_booking_form.elements['booking_id'].value);
                    get_all_booking();
                } else {
                    showAlert('error', 'Error has occured');
                }
            }
            xhr.send(data);
        }

        // function updateTotalPay(booking_id){
        //     let xhr = new XMLHttpRequest();
        //     xhr.open("POST", "logic/modify_booking.php", true);

        //     xhr.onload = function(){
        //         if(this.responseText == 1){
        //             showAlert('success', 'Booking Updated');
        //             modify_booking_form.reset();
        //             get_all_booking();
        //         }
        //         else{
        //             console.log(this.responseText);
        //             showAlert('error', 'Error no change made to payment');
        //         }
        //     }
        //     xhr.send('update_total_pay='+ booking_id);
        // }
        function updateTotalPay(booking_id) {
            let data = new FormData();
            data.append('update_total_pay', booking_id); // Use FormData to send the booking_id

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/modify_booking.php", true);

            xhr.onload = function() {
                if (this.responseText == 11) {
                    showAlert('success', 'Booking Updated');
                    modify_booking_form.reset();
                    get_all_booking();
                } else {
                    showAlert('error', 'Error: No change made to payment');
                }
            }

            xhr.send(data);
        }

    </script>
</body>

</html>