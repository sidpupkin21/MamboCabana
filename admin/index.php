<?php
require("../admin/db/funcs.php");
require("../admin/db/db_config.php");

session_start();

if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
    redirect('dashboard.php');  //dashboard.php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Admin Login Panel</title>
    <!--Bootstrap Link-->
    <?php require('../admin/db/links.php'); ?>

    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>

<body class="bg-light">

    <!--Admin Login Form-->
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_user" required type="text" class="form-control shadow-none text-center" placeholder="UserName">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn btn-success text-white custom-bg shadow-none">LOGIN</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $frm_data = filternation($_POST);

        $query = "SELECT * FROM `admins` WHERE `admin_user`=? AND `admin_pass`=?";

        $values = [$frm_data['admin_user'], $frm_data['admin_pass']];

        $res = select($query, $values, "ss");
        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            //session_start();
            $_SESSION["adminLogin"] = true;
            $_SESSION["adminId"] = $row['sr_no'];
            redirect('dashboard.php'); //dashboard.php
        } else {
            alert('error', 'Login has failed - Invalid Username/Password');
        }
        //print_r($res);
    }
    ?>

    <!--Bootstrap Script-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> -->
</body>

</html>