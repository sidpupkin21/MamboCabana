<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>
    <!-- <link rel="stylesheet" href="css/stylesheet.css" /> -->

    <title><?php echo $settings_r['site_logo'] ?> - FACILITIES </title>

    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>

<body class="bg-light">
    <?php require('shared/header.php'); ?>

    <div class="container">
        <div class="row">
            <?php 
                $res = selectAll('facilities');
                
                while($row = mysqli_fetch_assoc($res)){
                    echo <<<data
                        <div class="col-lg-4 col-md-6 mb-5 px-4">
                            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                <div class="d-flex align-items-center mb-2">
                                <iconify-icon icon="$row[icon]" width="50" height="50"></iconify-icon>
                                    <h5 class="m-2 ms-3 strong">$row[name]</h5>
                                </div>
                                <p style="height:100px;">$row[description]</p>
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