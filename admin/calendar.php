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
    <title>Admin - New Calendar</title>
    <?php require('../admin/db/links.php'); ?>
    <style>
        .calendar-container {
            overflow-x: auto;
            max-width: 100%;
        }

        .calendar {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .empty {
            background-color: #f2f2f2;
        }

        .booked {
            background-color: #228B22;/*#ffa07a;*/
            cursor: pointer;
        }

        .pending {
            background-color:#ffd700;/* #87ceeb; */
            cursor: pointer;
        }
        .completed{
            background-color:#fffacd;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-light">
    <?php require("../admin/db/header.php"); ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Bookings Calendar</h3>
                <div class="calendar-slider">
                    <button id="prev-button">Previous</button>
                    <div class="calendar-container" id="calendar-container"></div>
                    <button id="next-button">Next</button>
                </div>
            </div>
        </div>
    </div>
    
    <?php require("db/scripts.php"); ?>
    <script src="js/calendar.js"></script>
</body>

</html>