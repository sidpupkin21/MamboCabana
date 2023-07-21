<?php
require("../admin/db/funcs.php");
//require("../admin/db/db_config.php");
adminLogin();
//session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <?php require('../admin/db/links.php'); ?>
</head>

<body class="bg-white">
  <?php require("../admin/db/header.php"); ?>
  <div class="container-fluid" id="mainContent">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 md-0 overflow-hidden">
        <h3 class="mb-4">SETTINGS</h3>

        <!--General Settings-->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">General Settings</h5>
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                <i class="bi bi-pencil-square"></i>EDIT
              </button>
            </div>
            <h6 class="card-subtitle mb-1 fw-bold">Site Logo</h6>
            <p class="card-text" id="site_logo"></p>
            <h6 class="card-subtitle mb-1 fw-bold">Contact Info</h6>
            <p class="card-text" id="site_about"></p>
          </div>
        </div>


        <!--GS Modal-->
        <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="general_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">General Settings</h5>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Site Logo</label>
                    <input type="text" name="site_logo" id="site_logo_inp" class="form-control shadow-none" rows="1" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Contact Info</label>
                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="site_logo.value = general_data.site_logo, site_about.value = general_data.site_about" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                  <!-- <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal" data-bs-target="#general-s">SUBMIT</button> -->
                  <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!--Shutdown Website-->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">Shutdown Reservation</h5>
              <div class="form-check form-switch">
                <form>
                  <input type="checkbox" onchange="upd_shutdown(this.value)" class="form-check-input" id="shutdown-toggle">
                </form>
              </div>
            </div>
            <p class="card-text">
              By shutting down reservation, customers will not be allowed to book rooms, only admin control remains.
            </p>
          </div>
        </div>

        <!--Contact details section-->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">Contact Settings</h5>
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-s">
                <i class="bi bi-pencil-square"></i>Edit
              </button>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                  <p class="card-text" id="address"></p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Maps</h6>
                  <p class="card-text" id="gmap"></p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                  <p class="card-text mb-1">
                    <i class="bi bi-telephone-fill"></i>
                    <span id="pn1"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-telephone-fill"></i>
                    <span id="pn2"></span>
                  </p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">E-mail</h6>
                  <p class="card-text" id="email1"></p>
                  <p class="card-text" id="email2"></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                  <p class="card-text mb-1">
                    <i class="bi bi-facebook me-1"></i>
                    <span id="fb"></span>
                  </p>
                  <p class="card-text mb-1">
                    <i class="bi bi-instagram me-1" aria-hidden="true"></i>
                    <span id="insta"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-twitter me-1"></i>
                    <span id="tw"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-whatsapp me-1"></i>
                    <span id="ws"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-bootstrap me-1"></i>
                    <span id="bk"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--contacts modal-->
        <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form id="contacts_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Contacts Settings</h5>
                </div>
                <div class="modal-body">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Address</label>
                          <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Google Map Link</label>
                          <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Phone Numbers (with country code)</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" name="pn2" id="pn2_inp" class="form-control shadow-none">
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">Email</label>
                          <input type="email" name="email" id="email1_inp" class="form-control shadow-none" required>
                          <input type="email" name="email" id="email2_inp" class="form-control shadow-none" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">Social Links</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-facebook me-1"></i></span>
                            <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-instagram me-1"></i></span>
                            <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-twitter me-1"></i></span>
                            <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-whatsapp me-1"></i></span>
                            <input type="text" name="ws" id="ws_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-bootstrap me-1"></i></span>
                            <input type="text" name="bk" id="bk_inp" class="form-control shadow-none" required>
                          </div>
                        </div>
                        <!-- <div class="mb-4">
                          <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                          <p class="card-text mb-1">
                            <i class="bi bi-facebook me-1"></i>
                            <span id="fb_inp"></span>
                          </p>
                          <p class="card-text mb-1">
                            <i class="bi bi-instagram me-1"></i>
                            <span id="insta_inp"></span>
                          </p>
                          <p class="card-text">
                            <i class="bi bi-twitter me-1"></i>
                            <span id="tw_inp"></span>
                          </p>
                          <p class="card-text">
                            <i class="bi bi-whatsapp me-1"></i>
                            <span id="ws_inp"></span>
                          </p>
                          <p class="card-text">
                            <i class="bi bi-bootstrap me-1"></i>
                            <span id="bk_inp"></span>
                          </p>
                        </div>
                       -->
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                  </div>
                </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>


  </div>
  </div>

  <?php
  require("../admin/db/scripts.php") ?>

  <script src="../admin/js/settings.js"></script>
  <!-- <script>
    let general_data, contacts_data;
    let general_s_form = document.getElementById('general_s_form');

    let site_logo_inp = document.getElementById('site_logo_inp');
    let site_about_inp = document.getElementById('site_about_inp');
    let contacts_s_form = document.getElementById('contacts_s_form');

    function get_general() {
      let site_logo = document.getElementById('site_logo');
      let site_about = document.getElementById('site_about');

      let shutdown_toggler = document.getElementById('shutdown-toggle');


      let xhr = new XMLHttpRequest();
      xhr.open("POST", "logic/settings_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        console.log(general_data);
        site_logo.innerText = general_data.site_logo;
        site_logo_inp.value = general_data.site_logo;

        site_about.innerText = general_data.site_about;
        site_about_inp.value = general_data.site_about;

        if (general_data.shutdown == 0) {
          shutdown_toggler.checked = false;
          shutdown_toggler.value = 0;
        } else {
          shutdown_toggler.checked = true;
          shutdown_toggler.value = 1;
        }


      }

      xhr.send('get_general');
    }

    general_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      upd_general(site_logo_inp.value, site_about_inp.value);
    });

    function upd_general(site_logo_val, site_about_val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "logic/settings_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


      xhr.onload = function() {
        console.log(this.responseText);
        var mymodal = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(mymodal);
        modal.hide();
        if (this.responseText == 1) {
          alert('success', 'General Settings have been updated');
          get_general;

        } else {
          alert('error', 'No changes have been made');
        }

      }

      xhr.send('site_logo=' + site_logo_val + "&site_about=" + site_about_val + '&upd_general');
    }


    function upd_shutdown(val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "logic/settings_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        console.log(this.responseText);
        if (this.responseText == 1 && general_data.shutdown == 0) {
          alert('success', 'You have turn off reservation');
        } else {
          alert('success', 'You have turned on reservations');
        }
        get_general();
      }
      xhr.send('upd_shutdown=' + val);
    }

    function get_contacts() {
      let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email1','email2' ,'fb', 'insta', 'tw','ws','bk'];

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "logic/settings_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);
        console.log(this.responseText);

        for (i = 0; i < contacts_p_id.length; i++) {
          document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
        }
      }

      xhr.send('get_contacts');
    }


    window.onload = function() {
      get_general();
      get_contacts();

    }
  </script> -->

</body>

</html>