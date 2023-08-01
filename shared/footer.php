<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c8c1f4e6df.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<div class="container-fluid bg-white mt-5 rounded-top">
    <div class="row">
        <!-- <div class="col-lg-4 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded"> -->
        <div class="col-lg-4 p-4">
            <div class="bg-white p-4 rounded mb-4">
                <img src="images/logo/footer1.png" class="w-75 rounded align-items-center" height="300" />
            </div>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Site Navigation</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a></br />
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms & Suites</a></br />
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a></br />
            <a href="activity.php" class="d-inline-block mb-2 text-dark text-decoration-none">Activities & Locations</a></br />
            <a href="" class="d-inline-block mb-2 text-dark text-decoration-none">Client Reviews</a></br />
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a></br />
            <a href="admin/index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Admin Portal</a></br />
        </div>

    </div>
    <div class="container">
        <div class="copywrite-content">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="copywrite-text">
                        <p style="font-size:25px;">&copy; Scope Management | All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function alert(type, msg) {
            let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
            let alertContainer = document.getElementById('alert-container');

            // Remove any previous messages
            alertContainer.innerHTML = '';

            // Create the alert element and set its content
            let alertElement = document.createElement('div');
            alertElement.classList.add('alert', bs_class, 'alert-dismissible', 'fade', 'show');
            alertElement.setAttribute('role', 'alert');
            alertElement.innerHTML = `
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;

            // Append the alert to the container
            alertContainer.appendChild(alertElement);

            // Automatically remove the alert after 5 seconds
            setTimeout(function() {
                alertElement.remove();
            }, 5000);
        }


        function remAlert() {
            var alertElement = document.getElementsByClassName('alert')[0];
            if (alertElement) {
                alertElement.remove();
            }
            // document.getElementsByClassName('alert')[0].remove();
        }


        function setActive() {
            let navbar = document.getElementById('nav-bar');
            let a_tags = navbar.getElementsByTagName('a');

            for (i = 0; i < a_tags.length; i++) {
                let file = a_tags[i].href.split('/').pop();
                let file_name = file.split('.')[0];

                if (document.location.href.indexOf(file_name) >= 0) {
                    a_tags[i].classList.add('active');
                }

            }
        }

        //register scripts
        let register_form = document.getElementById('signup-form');

        register_form.addEventListener('submit', (e) => {
            e.preventDefault();

            let data = new FormData();

            data.append('name', register_form.elements['name'].value);
            data.append('email', register_form.elements['email'].value);
            data.append('username', register_form.elements['username'].value);
            data.append('phone', register_form.elements['phone'].value);
            data.append('dob', register_form.elements['dob'].value);
            data.append('cpassword', register_form.elements['cpassword'].value);
            data.append('password', register_form.elements['password'].value);
            data.append('register', '');

            var myModal = document.getElementById('signupModal');
            var modal = bootstrap.Modal.getInstance(myModal);
            // modal.hide();

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/login_register.php", true);

            xhr.onload = function() {
                const response = JSON.parse(this.responseText);
                if (response.status === 'error') {
                    // Show error alert
                    alert('error', response.message);
                } else if (response.status === 'success') {
                    // Show success alert
                    alert('success', response.message);
                    register_form.reset();
                }
            }

            xhr.send(data);
        });

        //login scripts

        let login_form = document.getElementById('login-form');
        login_form.addEventListener('submit', (e) => {
            e.preventDefault();

            let data = new FormData();
            data.append('email_mob', login_form.elements['email_mob'].value);
            data.append('password', login_form.elements['password'].value);
            data.append('login', '');

            var myModal = document.getElementById('loginModal');
            var modal = bootstrap.Modal.getInstance(myModal);
            //modal.hide();

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/login_register.php", true);
            xhr.onload = function() {
                console.log(this.responseText);
                const response = JSON.parse(this.responseText);

                if (this.responseText == 'inv_email_mob') {
                    alert('error', "Invalid Email or Mobile Number!");
                } else if (this.responseText == 'not_verified') {
                    alert('error', "Email is not verified!");
                } else if (this.responseText == 'invalid_pass') {
                    alert('error', "Incorrect Password!");
                } else {
                    // let fileurl = window.location.href.split('/').pop().split('?').shift();
                    // if (fileurl == 'room_details.php') {
                    //     window.location = window.location.href;
                    // } else {
                    //     window.location = window.location.pathname;
                    // }
                    alert('success', response.message);
                    login_form.reset();
                }
            }
            xhr.send(data);
        });

        setActive();
    });
</script>