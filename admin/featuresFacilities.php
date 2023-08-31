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
    <title>Admin - Features & </title>
    <?php require('../admin/db/links.php'); ?>
    <style>
        .my-icon {
            font-family: 'Bootstrap Icons';
            content: "\f1f8";
        }

        .info-but {
            float: right;

        }
    </style>
</head>

<body class="bg-light">
    <?php require("../admin/db/header.php"); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">FEATURES & FACILITIES</h3>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-light shadow-none btn-sm info-but" data-bs-toggle="modal" data-bs-target="#information-m">
                            <i class="bi bi-question-square-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Feature</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                ADD <i class="bi bi-plus-square"></i>
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col" width="5%">#ID</th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="10%">Icon</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facility</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                ADD <i class="bi bi-plus-square"></i>
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col" width="5%">#ID</th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="10%">Icon</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Features Modal-->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="text" name="feature_icon" class="form-control shadow-none" placeholder="Enter the following bootstrap icon format (bi bi-(icon)">
                            <!-- <textarea name="feature_icon" class="form-control shadow-none" required>&#xf1f8;</textarea> -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger text-white shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Facilities Modal-->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Facility</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="text" name="facility_icon" class="form-control shadow-none" placeholder="Enter the following bootstrap icon format (bi bi-(icon)" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="facility_desc" class="form-control shadow-none" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger text-white shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Information Modal-->
    <div class="modal fade" id="information-m" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">How to get Icon</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p>In order to add a button icon, first visit the following link: https://icons.getbootstrap.com/</p>
                        <p>Search for desired icon, then copy for example bi bi-0-square from <strong>i class="bi bi-0-square"</strong>without quotations from the class and paste inside the add icon for feature or facility</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger text-white shadow-none" data-bs-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    require("../admin/db/scripts.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script src="../admin/js/features_facilities.js"></script>
</body>

</html>