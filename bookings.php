<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>

    <title><?php echo $settings_r['site_logo'] ?> - BOOKINGS </title>
    <style>
        .custom-alert {
            position: fixed;
            top: 120px;
            right: 25px;
            z-index: 9999;
        }
    </style>
</head>

<body class="bg-light">
    <?php require('shared/header.php');
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('index.php');
    }
    ?>
    <div class="container">
        <div class="row">

            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">Your Bookings</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">BOOKINGS</a>
                </div>
            </div>

            <?php

            $query = "SELECT bo.*, bd.* FROM `booking_order` bo
                INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
                WHERE ((bo.booking_status='booked') 
                OR (bo.booking_status='cancelled')
                OR (bo.booking_status='pending')
                OR (bo.booking_status='completed')) 
                AND (bo.user_id=?)
                ORDER BY bo.booking_id DESC";

            $result = select($query, [$_SESSION['uId']], 'i');

            while ($data = mysqli_fetch_assoc($result)) {
                $date = date("d-m-Y", strtotime($data['datentime']));
                $checkin = date("d-m-Y", strtotime($data['check_in']));
                $checkout = date("d-m-Y", strtotime($data['check_out']));

                $status_bg = "";
                $btn = "";
                $btn2 = "";

                if ($data['booking_status'] == 'completed') {
                    $status_bg = "bg-success";
                    $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Download PDF</a>";
                    if ($data['rate_review'] == 0) {
                        $btn2 = "<button type='button' onclick='review_room($data[booking_id],$data[room_id])' data-bs-toggle='modal' data-bs-target='#reviewModal' class='btn btn-dark btn-sm shadow-none ms-1'>Rate & Review</button>";
                    } else {
                    }
                } else if ($data['booking_status'] == 'booked') {
                    $status_bg = "custom-bg";
                    $btn = "<button onclick='cancel_booking($data[booking_id])' type='button' class='btn btn-danger btn-sm shadow-none'>Cancel</button>";
                    $btn2 = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Download PDF</a>";
                } else if ($data['booking_status'] == 'pending') {
                    $status_bg = 'bg-warning';
                    $btn = "<button onclick='cancel_booking($data[booking_id])' type='button' class='btn btn-danger btn-sm shadow-none'>Cancel</button>";
                    $btn2 = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Download PDF</a>";
                } else if ($data['booking_status'] == 'cancelled') {
                    $status_bg = 'bg-danger';
                    $btn2 = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Download PDF</a>";
                } else {
                    $status_bg = "bg-warning";
                    $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>Download PDF</a>";
                }

                echo <<<bookings
                <div class='col-md-4 px-4 mb-4'>
                    <div class='bg-white p-3 rounded shadow-sm'>
                        <h5 class='fw-bold'>$data[room_name]</h5>
                        <p>$$data[price] per </p>
                        <p>
                            <b>Check in: </b> $checkin 
                            <br>
                            <b>Check out: </b> $checkout
                        </p>
                        <p>
                            <b>Amount: </b> $$data[total_pay]
                            <br>
                            <b>Order ID: </b> $data[order_id] 
                            <br>
                            <b>Date: </b> $date
                        </p>
                        <p>
                        <span class='badge $status_bg'>$data[booking_status]</span>
                        </p>
                        <p>
                        $btn $btn2
                        </p>
                    </div>
                </div>
                bookings;
            }

            ?>

        </div>
    </div>

    <!-- <div class="modal fade" id="reviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="review-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-chat-square-heart-fill fs-3 me-2"></i> Rate & Review
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-select shadow-none">
                                <option value="5">Excellent</option>
                                <option value="4">Good</option>
                                <option value="3">Satisfactory</option>
                                <option value="2">Poor</option>
                                <option value="1">Bad</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Review</label>
                            <textarea name="password" name="review" rows="3" required class="form-control shadow-none"></textarea>
                        </div>

                        <input type="hidden" name="booking_id">
                        <input type="hidden" name="room_id">

                        <div class="text-end">
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="reviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="review-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-chat-square-heart-fill fs-3 me-2"></i> Rate & Review
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select class="form-select shadow-none" name="rating">
                                <option value="5">Excellent</option>
                                <option value="4">Good</option>
                                <option value="3">Ok</option>
                                <option value="2">Poor</option>
                                <option value="1">Bad</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Review</label>
                            <textarea type="password" name="review" rows="3" required class="form-control shadow-none"></textarea>
                        </div>

                        <input type="hidden" name="booking_id">
                        <input type="hidden" name="room_id">

                        <div class="text-end">
                            <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    if (isset($_GET['cancel_status'])) {
        alert('success', 'Booking Cancelled');
    } else if (isset($_GET['review_status'])) {
        alert('success', 'Thank you for your review');
    }

    ?>
    <?php require('shared/footer.php');
    ?>

    <script>
        function confirmAction(isConfirmed, onConfirm, onCancel) {
            if (isConfirmed) {
                onConfirm();
            } else {
                onCancel();
            }
            const confirmElement = document.querySelector('.custom-confirm');
            confirmElement.remove();
        }

        function showConfirm(msg, onConfirm, onCancel, position = 'body') {
            let element = document.createElement('div');
            element.innerHTML = `
            <div class="alert-container" style="margin-top:10%">
                <div class="alert alert-info alert-dismissible fade show custom-confirm" role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn btn-success me-1" id="confirmBtn">Confirm</button>
                <button type="button" class="btn btn-danger" id="cancelBtn">Cancel</button>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            `;

            if (position === 'body') {
                document.body.append(element);
                element.classList.add('custom-alert');
            } else {
                document.getElementById(position).appendChild(element);
            }

            const confirmBtn = element.querySelector('#confirmBtn');
            const cancelBtn = element.querySelector('#cancelBtn');

            confirmBtn.addEventListener('click', () => {
                confirmAction(true, onConfirm, onCancel);
            });

            cancelBtn.addEventListener('click', () => {
                confirmAction(false, onConfirm, onCancel);
            });
        }

        function showAlert(type, msg, position = 'body') {
            let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
            let element = document.createElement('div');
            element.innerHTML = `
  <div class="alert-container" style="margin-top:20%">
    <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
      <strong class="me-3">${msg}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
  `;

            if (position == 'body') {
                document.body.append(element);
                element.classList.add('custom-alert');
            } else {
                document.getElementById(position).appendChild(element);
            }
            setTimeout(remAlert, 5000);
        }

        function remAlert() {
            var alertElement = document.getElementsByClassName('alert')[0];
            if (alertElement) {
                alertElement.remove();
            }
            // document.getElementsByClassName('alert')[0].remove();
        }


        function setActive() {
            let navbar = document.getElementById('nav-bar');
            let a_tags = navbar.getElementsByTagName('a');

            for (i = 0; i < a_tags.length; i++) {
                let file = a_tags[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if (document.location.href.indexOf(file_name) >= 0) {
                    a_tags[i].classList.add('active');
                }

            }
        }

        setActive();
    </script>


    <script>
        function cancel_booking(id) {
            showConfirm("Are you sure you want to cancel this reservation?",
                () => {
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "logic/cancel_booking.php", true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    xhr.onload = function() {
                        console.log(this.responseText);
                        if (this.responseText == 1) {
                            window.location.href = "bookings.php?cancel_status=true";
                        } else {
                            showAlert('eroor', 'Booking Cancellation failed');
                        }
                    }
                    xhr.send('cancel_booking&id=' + id);
                },
                () => {
                    // Do nothing when canceled
                }
            );
        }

        let review_form = document.getElementById('review-form');

        function review_room(bid, rid) {
            review_form.elements['booking_id'].value = bid;
            review_form.elements['room_id'].value = rid;
        }

        review_form.addEventListener('submit', function(e) {
            e.preventDefault();

            let data = new FormData();

            data.append('review_form', '');
            data.append('rating', review_form.elements['rating'].value);
            data.append('review', review_form.elements['review'].value);
            data.append('booking_id', review_form.elements['booking_id'].value);
            data.append('room_id', review_form.elements['room_id'].value);


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/review_room.php", true);

            xhr.onload = function() {
                console.log(this.responseText);
                if (this.responseText == 1) {
                    window.location.href = 'bookings.php?review_status=true';
                } else {
                    var myModal = document.getElementById('reviewModal');
                    var modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();

                    showAlert('error', "Rating & Review has Failed!");
                }
            }
            xhr.send(data);

        })
    </script>



</body>

</html>