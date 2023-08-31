<?php
require("db/db_config.php");
require("db/funcs.php");
require("db/mpdf/vendor/autoload.php");
require("db/qr/qrlib.php");
adminLogin();

if (isset($_GET['gen_pdf']) && isset($_GET['id'])) {
    $frm_data = filternation($_GET);

    $query = "SELECT bo.*, bd.*, uc.email FROM `booking_order` bo
    INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
    INNER JOIN `user` uc ON bo.user_id = uc.id
    WHERE (
        (bo.booking_status = 'booked')
        OR (bo.booking_status = 'pending')
        OR (bo.booking_status = 'complete')
        OR (bo.booking_status = 'cancelled')
    )
    AND bo.booking_id = '$frm_data[id]'";

    $res = mysqli_query($conn, $query);
    $total_rows = mysqli_num_rows($res);

    if ($total_rows == 0) {
        header('location: dashboard.php');
        exit;
    }

    $data = mysqli_fetch_assoc($res);

    $date = date("h:ia | d-m-Y", strtotime($data['datentime']));
    $checkin = date("d-m-Y", strtotime($data['check_in']));
    $checkout = date("d-m-Y", strtotime($data['check_out']));

    // Convert the string dates to DateTime objects
    $checkinDate = DateTime::createFromFormat('d-m-Y', $checkin);
    $checkoutDate = DateTime::createFromFormat('d-m-Y', $checkout);

    // Calculate the difference in days
    $interval = $checkinDate->diff($checkoutDate);
    $numberOfDays = $interval->days;

    $table_data = "
    <img src='images/logo/3.jpeg' style='width:350px; height:250px;'>
    <h2>BOOKING RECIEPT</h2>
    <table>
        <tr>
            <td>ORDER ID: $data[order_id]</td>
            <br>
        </tr>
        <tr>
            <td>BOOKING DATE: $date</td>
            <br>
        </tr>
        <tr>
            <td><span style='background-color: yellow;'>Status: $data[booking_status]</span></td>
            <br>
        </tr>
        <tr>
            <td>Customer's Name: $data[user_name]</td>
            <br>
        </tr>
        <tr>
            <td>Customer's Email: $data[email]</td>
            <br>
        </tr>
        <tr>
            <td>Customer's Phone: $data[phone]</td>
            <br>
        </tr>
        <tr>
            <td>Room: $data[room_name]</td>
            <br>
        </tr>
        <tr>
            <td>Price: $$data[price] per night </td>
            <br>
        </tr>
        <tr>
            <td>Check-in: $checkin</td>
            <br>
        </tr>
        <tr>
            <td>Check-out: $checkout</td>
            <br>
        </tr>
        <tr>
            <td>Length of Stay: $numberOfDays Nights</td>
        </tr>
        
        ";

    if ($data['booking_status'] == 'cancelled') {
        $table_data .= "
        <tr>
            <td>Total Pay: (THIS BOOKING HAS BEEN CANCELLED NO PAYMENT NEEDED)</td>
            <br>
        </tr>";
    } else if ($data['booking_status'] == 'cancelled') {
        $table_data .= "
        <tr>
            <td>Total Pay: (THIS BOOKING IS STILL PENDING, ONCE APPROVED YOU WILL RECIEVE AN ALERT ALONG WITH THE TOTAL COST)</td>
            <br>
        </tr>";
    } else if ($data['room_no'] == null) {
        $table_data .= "
        <tr>
            <td>Total Pay: $$data[total_pay]</td>
            <br>
        </tr>
        <tr>
            <td>Room Number: (ROOM NUMBER IS NOT YET ASSIGNED. PLEASE WAIT UNTIL 24H PRIOR TO YOUR ARRIVAL TO VIEW YOUR ROOM NUMBER)</td>

            <br>
        </tr>
        ";
    } else {
        $table_data .= "
        <tr>
            <td>Total Pay: $$data[total_pay]</td>
            <br>
        </tr>
        <tr></tr>
        <tr>
            <td>Room Number: $data[room_no]</td>
            <br>
        </tr>
        ";
    }

    // Set the default timezone to Zanzibar
    date_default_timezone_set('Africa/Dar_es_Salaam');

    // Convert checkin date to DateTime object
    $checkinDate = DateTime::createFromFormat('d-m-Y', $checkin);

    // Set check-in time to 12:00 PM
    $checkinDate->setTime(16, 0, 0);

    // Convert checkout date to DateTime object
    $checkoutDate = DateTime::createFromFormat('d-m-Y', $checkout);

    // Set checkout time to 3:00 PM
    $checkoutDate->setTime(19, 0, 0);

    // Format dates for Google Calendar
    $formatted_checkin = $checkinDate->format('M j Y \a\t g:i A');
    $formatted_checkout = $checkoutDate->format('M j Y \a\t g:i A');

    // Generate the Google Calendar event URL
    $event_title = "Mambo Cabana Reservation - $data[room_name]";
    $google_calendar_url = "https://www.google.com/calendar/render?action=TEMPLATE&text=$event_title&dates={$checkinDate->format('Ymd\THis\Z')}/{$checkoutDate->format('Ymd\THis\Z')}";

    // Generate QR code image data directly
    $qr_temp_file = tempnam(sys_get_temp_dir(), 'qr_code');
    QRcode::png($google_calendar_url, $qr_temp_file, QR_ECLEVEL_L, 10);
    $qr_code_data = 'data:image/png;base64,' . base64_encode(file_get_contents($qr_temp_file));
    unlink($qr_temp_file);

    $table_data .= " 
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td style='text-align: center;'><img src='$qr_code_data' alt='QR Code' style='width: 250px; height: 250px;'/></td>
                
            </tr>";
            $table_data .= "
            <tr><td style='text-align: center;'><a href='$google_calendar_url'>Add Event To Calendar</a></td></tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
            <tr>
                <td>^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</td>
            </tr>
        </table>

        <p>All Payments will be collected during Checkin.</p>
        <p> ON BEHALF OF THE MAMBO CABANA TEAM WE LOOK FORWARD TO HOSTING YOU!!";

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($table_data);
    $mpdf->Output($data['order_id'] . '.pdf', 'D');
} else {
    header('location: dashboard.php');
}
