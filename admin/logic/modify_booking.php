<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

// function getRoomPriceFromDatabase($booking_id) {
//     // Perform a database query to retrieve the room price based on the booking_id by joining booking_order and booking_details tables
//     $query = select("SELECT bd.price FROM booking_order bo
//                      JOIN booking_details bd ON bo.booking_id = bd.booking_id
//                      WHERE bo.booking_id=?", [$booking_id], 'i');
//     $result = mysqli_fetch_assoc($query);

//     if ($result) {
//         return $result['price'];
//     } else {
//         // Handle the case where the room price is not found
//         return 0; // You can return a default value or handle the error as needed
//     }
// }
// function getRoomPriceFromDatabase($room_id) {
//     // Perform a database query to retrieve the room price based on the room_id from the booking_order table
//     $query = select("SELECT `price` FROM `booking_order` WHERE `room_id`=?", [$room_id], 'i');
//     $result = mysqli_fetch_assoc($query);

//     if ($result) {
//         return $result['price'];
//     } else {
//         // Handle the case where the room price is not found
//         return 0; // You can return a default value or handle the error as needed
//     }
// }



if(isset($_POST['get_all_booking'])){
    $query = select("SELECT * FROM `booking_order` WHERE `arrival`=?", [0], 'i');
    $i = 1;
    $data = "";

    while($row = mysqli_fetch_assoc($query)){
        $data .= "<tr>
        <td>$i</td>
        <td>$row[order_id]</td>
        <td>$row[check_in]</td>
        <td>$row[check_out]</td>
        <td>     
            <button type='button' onclick='edit_booking($row[booking_id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#modify-booking'>
            <i class='bi bi-pencil-square'></i> 
            </button>
        </td>

    </tr>";
    $i++;
    }
    echo $data;
}

if(isset($_POST['get_booking'])){
    $frm_data = filternation($_POST);

    $res = select("SELECT * FROM `booking_order` WHERE `booking_id`=?", [$frm_data['get_booking']], 'i');
    $bookingdata = mysqli_fetch_assoc($res);

    $data = ["bookingdata"=>$bookingdata];
    $data = json_encode($data);
    echo $data;
}

if(isset($_POST['edit_bookings'])){
    $frm_data = filternation($_POST);
    $flag = 0;

    $q = "UPDATE `booking_order` SET `check_in`=?, `check_out`=? WHERE `booking_id`=?";
    $values = [$frm_data['check_in'], $frm_data['check_out'], $frm_data['booking_id']];

    if(update($q, $values, 'ssi')){
        $flag = 1;
    }
    if($flag){
        echo 1;
    }
    else {
        echo 0;
    }
}

if (isset($_POST['update_total_pay'])) {
    $frm_data = filternation($_POST);
    $flag = 0;

    $query1 = "SELECT `check_in`, `check_out`, `room_id` FROM `booking_order` WHERE `booking_id`=?";
    $values1 = [$frm_data['update_total_pay']];
    $result1 = select($query1, $values1, 'i');
    $booking_data = mysqli_fetch_assoc($result1);

    $count_days = date_diff(new DateTime($booking_data['check_in']), new DateTime($booking_data['check_out']))->days;

    // Replace this line with code to fetch the room price from the database
    $room_price = getRoomPriceFromDatabase($booking_data['room_id']);

    $new_total_pay = $room_price * $count_days;

    // Update the total_pay in the booking_details table
    $query2 = "UPDATE `booking_details` SET `total_pay`=? WHERE `booking_id`=?";
    $values2 = [$new_total_pay, $frm_data['update_total_pay']];

    if (update2($query2, $values2, 'ii')) {
        $flag = 1;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}

// if (isset($_POST['update_total_pay'])) {
//     $frm_data = filternation($_POST);
//     $flag = 0;

//     $query1 = "SELECT `check_in`, `check_out`, `room_id` FROM `booking_order` WHERE `booking_id`=?";
//     $values1 = [$frm_data['update_total_pay']];
//     $result1 = select($query1, $values1, 'i');
//     $booking_data = mysqli_fetch_assoc($result1);

//     // Calculate the number of days between check-in and check-out
//     $count_days = date_diff(new DateTime($booking_data['check_in']), new DateTime($booking_data['check_out']))->days;

//     // Retrieve the price of the room from the booking_details table based on the room_id
//     $room_id = $booking_data['room_id'];
//     $query2 = "SELECT `price` FROM `booking_details` WHERE `room_id`=?";
//     $values2 = [$room_id];
//     $result2 = select($query2, $values2, 'i');
//     $room_data = mysqli_fetch_assoc($result2);

//     if ($room_data) {
//         $room_price = $room_data['price'];

//         // Calculate the new total_pay
//         $new_total_pay = $room_price * $count_days;

//         // Update the total_pay in the booking_details table
//         $query3 = "UPDATE `booking_details` SET `total_pay`=? WHERE `booking_id`=?";
//         $values3 = [$new_total_pay, $frm_data['update_total_pay']];

//         if (update2($query3, $values3, 'ii')) {
//             $flag = 1;
//         }
//     }

//     if ($flag) {
//         echo 1;
//     } else {
//         echo 0;
//     }
// }

function getRoomPriceFromDatabase($booking_id) {
    // Perform a database query to retrieve the room price based on the booking_id by joining booking_details and rooms tables
    $query = select("SELECT r.price FROM booking_order bd
                     JOIN rooms r ON bd.room_id = r.id
                     WHERE bd.booking_id=?", [$booking_id], 'i');
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        return $result['price'];
    } else {
        // Handle the case where the room price is not found
        return 0; // You can return a default value or handle the error as needed
    }
}

if (isset($_POST['update_total_pay'])) {
    $frm_data = filternation($_POST);
    $flag = 0;

    $query1 = "SELECT `check_in`, `check_out`, `room_id` FROM `booking_order` WHERE `booking_id`=?";
    $values1 = [$frm_data['update_total_pay']];
    $result1 = select($query1, $values1, 'i');
    $booking_data = mysqli_fetch_assoc($result1);

    $count_days = date_diff(new DateTime($booking_data['check_in']), new DateTime($booking_data['check_out']))->days;

    // Fetch the room price from the database using the modified function
    $room_price = getRoomPriceFromDatabase($frm_data['update_total_pay']);

    $new_total_pay = $room_price * $count_days;

    // Update the total_pay in the booking_details table
    $query2 = "UPDATE `booking_details` SET `total_pay`=? WHERE `booking_id`=?";
    $values2 = [$new_total_pay, $frm_data['update_total_pay']];

    if (update2($query2, $values2, 'ii')) {
        $flag = 1;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}

?>