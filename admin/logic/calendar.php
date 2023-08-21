<?php
// require("../db/funcs.php");
// require("../db/db_config.php");
// adminLogin();
// date_default_timezone_set("Asia/Dubai");

// // Calculate the current date
// $currentDate = new DateTime('now');

// // Calculate the date two days before today
// $startDate = clone $currentDate;
// $startDate->modify('-7 days');

// // Set the end date to October 1, 2023
// $endDate = new DateTime('January 1, 2024');

// // Fetch room names from the database
// $roomTypesQuery = "SELECT DISTINCT bd.room_name FROM booking_details bd";
// $roomTypesResult = select2($roomTypesQuery, [], '');

// $roomTypes = [];
// while ($row = mysqli_fetch_assoc($roomTypesResult)) {
//     $roomTypes[] = $row['room_name'];
// }

// $dateRange = generateDateRange($startDate, $endDate);

// $bookingData = [];

// // Initialize bookingData array with empty entries for all dates and room types
// foreach ($roomTypes as $roomType) {
//     foreach ($dateRange as $date) {
//         $bookingData[$roomType][$date] = [];
//     }
// }

// $query = "SELECT bd.room_name, bo.check_in, bo.check_out, bo.booking_status, bo.order_id FROM booking_order bo
//           JOIN booking_details bd ON bo.booking_id = bd.booking_id";
// $result = select2($query, [], '');

// // Loop through the result and organize data as needed
// while ($row = mysqli_fetch_assoc($result)) {
//     // Process and filter data as necessary
//     $filteredData = filternation($row);

//     // Determine booking status color
//     $statusClass = '';
//     if ($filteredData['booking_status'] === 'booked') {
//         $statusClass = 'booked';
//     } elseif ($filteredData['booking_status'] === 'pending') {
//         $statusClass = 'pending';
//     } 
//     elseif ($filteredData['booking_status'] === 'completed') {
//         $statusClass = 'completed';
//     } 
//     else {
//         $statusClass = 'vacant';
//     }

//     // Calculate the number of days between check-in and check-out dates
//     $checkIn = new DateTime($filteredData['check_in']);
//     $checkOut = new DateTime($filteredData['check_out']);
//     $dateDiff = $checkIn->diff($checkOut)->days;

//     // Process each room type
//     foreach ($roomTypes as $roomType) {
//         if ($filteredData['room_name'] === $roomType) {
//             $currentDate = clone $checkIn; // Clone the check-in date

//             for ($i = 0; $i <= $dateDiff; $i++) {
//                 $date = $currentDate->format('M j Y');

//                 // Add booking data for the room and date
//                 $bookingData[$roomType][$date][] = [
//                     "check_in" => $filteredData['check_in'],
//                     "check_out" => $filteredData['check_out'],
//                     "status" => $statusClass,
//                     "orderId" => $filteredData['order_id']
//                 ];

//                 $currentDate->modify("+1 day"); // Move to the next day
//             }
//         }
//     }
// }

// // Send JSON response
// header('Content-Type: application/json');
// echo json_encode($bookingData);

// function generateDateRange($startDate, $endDate)
// {
//     $dateRange = [];
//     while ($startDate <= $endDate) {
//         $dateRange[] = $startDate->format('M j Y');
//         $startDate->modify('+1 day');
//     }

//     return $dateRange;
// }
?>
<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();
date_default_timezone_set("Asia/Dubai");

// Check if a specific start date is provided in the query string
if (isset($_GET['startDate'])) {
    $startDate = new DateTime($_GET['startDate']);
} else {
    // Calculate the current date
    $currentDate = new DateTime('now');

    // Calculate the date one month before today (adjust this as needed)
    $startDate = clone $currentDate;
    $startDate->modify('-15 days');
}

// Set the end date to 30 days after the start date
$endDate = clone $startDate;
$endDate->modify('+16 days'); // This covers the current page and the next page

// Fetch room names from the database
$roomTypesQuery = "SELECT DISTINCT bd.room_name FROM booking_details bd";
$roomTypesResult = select2($roomTypesQuery, [], '');

$roomTypes = [];
while ($row = mysqli_fetch_assoc($roomTypesResult)) {
    $roomTypes[] = $row['room_name'];
}

// Fetch booking data for the specified date range
$query = "SELECT bd.room_name, bo.check_in, bo.check_out, bo.booking_status, bo.order_id
          FROM booking_order bo
          JOIN booking_details bd ON bo.booking_id = bd.booking_id
          WHERE bo.check_out >= '" . $startDate->format('Y-m-d') . "' AND bo.check_in <= '" . $endDate->format('Y-m-d') . "'";

$result = select2($query, [], '');

// ...

$bookingData = [];

// Initialize bookingData array with empty entries for all room types and dates
foreach ($roomTypes as $roomType) {
    foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
        $dateStr = $date->format('M j Y');
        $bookingData[$roomType][$dateStr] = [];
    }
}

// Create a DatePeriod for the entire date range
$fullDateRange = new DatePeriod($startDate, new DateInterval('P1D'), $endDate);

// Loop through the result and organize data
while ($row = mysqli_fetch_assoc($result)) {
    $roomName = $row['room_name'];
    $checkIn = new DateTime($row['check_in']);
    $checkOut = new DateTime($row['check_out']);
    $status = $row['booking_status'];
    $orderId = $row['order_id'];

    // Iterate through the full date range and check if the current date is within the booking period
    foreach ($fullDateRange as $date) {
        $dateStr = $date->format('M j Y');
        
        if ($date >= $checkIn && $date <= $checkOut) {
            $bookingData[$roomName][$dateStr][] = [
                "check_in" => $checkIn->format('Y-m-d'),
                "check_out" => $checkOut->format('Y-m-d'),
                "status" => $status,
                "orderId" => $orderId
            ];
        }
    }
}

// ...


// Send JSON response
header('Content-Type: application/json');
echo json_encode($bookingData);

function generateDateRange($startDate, $endDate)
{
    $dateRange = [];
    while ($startDate <= $endDate) {
        $dateRange[] = $startDate->format('M j Y');
        $startDate->modify('+1 day');
    }

    return $dateRange;
}

?>
