<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>
    <!-- <link rel="stylesheet" href="css/stylesheet.css" /> -->

    <title><?php echo $settings_r['site_logo'] ?> - ACTIVITY </title>

    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }

        .desc_size {
            height: 350px;
        }

        @media screen and (max-wdith: 900px) {
            .desc_size {
                height: 700px;
            }
        }
    </style>
</head>

<body class="bg-light">
    <?php require('shared/header.php'); ?>

    <div class="container">
        <div class="row">
            <?php
            $res = selectAll('activity');

            while ($row = mysqli_fetch_assoc($res)) {
                echo <<<data
                        <div class="col-lg-6 col-md-6 mb-5 px-4">
                            <div class="bg-white rounded shadow p-4 border-bottom border-4 border-dark pop">
                                <div class="d-flex align-items-center mb-2">
                                    <iconify-icon icon="$row[icon]" width="50" height="50"></iconify-icon>
                                    <h5 class="m-4 ms-3">$row[name]</h5>
                                </div>
                                <p class="desc_size">$row[description]</p> 
                            </div>
                        </div>

                    data;
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const backToTopBtn = $("#backToTopBtn");

            $(window).scroll(function() {
                if ($(window).scrollTop() > 300) {
                    backToTopBtn.addClass("show");
                } else {
                    backToTopBtn.removeClass("show");
                }
            });

            const websiteUrl = "<?php echo $contact_r['ws']; ?>";

            // Modify the button click behavior
            backToTopBtn.on("click", function(e) {
                e.preventDefault();

                // Navigate to the website URL obtained from PHP
                if (websiteUrl) {
                    window.location.href = websiteUrl;
                }
            });
        });
    </script>
    <a id="backToTopBtn" class="btn-blue">
        <i class="bi bi-whatsapp me-1" width="50" height="50"></i>
    </a>

    <?php require('shared/footer.php'); ?>

</body>

</html>