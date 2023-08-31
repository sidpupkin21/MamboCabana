<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <?php require('shared/links.php'); ?>
    <!-- <link rel="stylesheet" href="css/stylesheet.css" /> -->

    <title><?php echo $settings_r['site_logo'] ?> - CONTACT US</title>

    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.07);
            transition: all 0.3s;
        }
    </style>
</head>


<body class="bg-light">
    <?php require('shared/header.php'); ?>
    <?php
    if (isset($_POST['send'])) {
        $frm_data = filternation($_POST);
        $q = "INSERT INTO `user_query`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
        $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

        $res = insert($q, $values, 'ssss');
        if ($res == 1) {
            alert('success', 'Message has been sent to Management Team. You will be contacted shortly');
        } else {
            alert('error', 'Something went wrong! Please try again.');
        }
    }
    ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            <?php echo $settings_r['site_about'] ?>
        </p>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-light shadow p-4 rounded-top">
                <div class="bg-white rounded shadow p-4 pop">
                    <form method="POST">
                        <h5>Send us a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Email</label>
                            <input type="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Subject</label>
                            <input type="text" name="subject" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Message</label>
                            <textarea name="message" class="form-control shadow-none" rows="10" style="resize:none;" required></textarea>
                        </div>
                        <button type="submit" name="send" class="btn text-white custom-bg mt-3">SEND</button>
                    </form>
                </div>
            </div>
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




    <?php require('shared/footer.php');

    ?>
</body>

</html>