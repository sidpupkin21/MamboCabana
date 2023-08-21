<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();
date_default_timezone_set("Asia/Dubai");

// Calculate the current date
$currentDate = new DateTime('now');

// Calculate the date two days before today
$startDate = clone $currentDate;
$startDate->modify('-4 days');

// Set the end date to January 1, 2025
$endDate = new DateTime('October 1, 2023');

// Fetch room names from the database
$roomTypesQuery = "SELECT DISTINCT bd.room_name FROM booking_details bd";
$roomTypesResult = select2($roomTypesQuery, [], '');

$roomTypes = [];
while ($row = mysqli_fetch_assoc($roomTypesResult)) {
    $roomTypes[] = $row['room_name'];
}

$dateRange = generateDateRange($startDate, $endDate);

$bookingData = [];

// Initialize bookingData array with empty entries for all dates and room types
foreach ($roomTypes as $roomType) {
    foreach ($dateRange as $date) {
        $bookingData[$roomType][$date] = [
            "status" => "empty",
            "orderId" => null
        ];
    }
}

$query = "SELECT bd.room_name, bo.check_in, bo.check_out, bo.booking_status, bo.order_id FROM booking_order bo
          JOIN booking_details bd ON bo.booking_id = bd.booking_id";
$result = select2($query, [], '');

// Loop through the result and organize data as needed
while ($row = mysqli_fetch_assoc($result)) {
    // Process and filter data as necessary
    $filteredData = filternation($row);

    // Determine booking status color
    $statusClass = '';
    if ($filteredData['booking_status'] === 'booked') {
        $statusClass = 'booked';
    } elseif ($filteredData['booking_status'] === 'pending') {
        $statusClass = 'pending';
    } else {
        $statusClass = 'empty';
    }

    // Calculate the number of days between check-in and check-out dates
    $checkIn = new DateTime($filteredData['check_in']);
    $checkOut = new DateTime($filteredData['check_out']);
    $dateDiff = $checkIn->diff($checkOut)->days;

    // Process each room type
    foreach ($roomTypes as $roomType) {
        if ($filteredData['room_name'] === $roomType) {
            $currentDate = clone $checkIn; // Clone the check-in date

            for ($i = 0; $i <= $dateDiff; $i++) {
                $date = $currentDate->format('M j Y');

                // Add booking status for the room and date
                $bookingData[$roomType][$date] = [
                    "status" => $statusClass,
                    "orderId" => $filteredData['order_id']
                ];

                $currentDate->modify("+1 day"); // Move to the next day
            }
        }
    }
}

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