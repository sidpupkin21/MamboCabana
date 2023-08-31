let add_admin_form = document.getElementById('add_admin_form');

add_admin_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_admin();
});

function add_admin() {
    let data = new FormData();
    data.append('add_admin', '');
    data.append('adminuser', add_admin_form.elements['adminuser'].value);
    data.append('adminpass', add_admin_form.elements['adminpass'].value);


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/admins.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('add-admin');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            showAlert('success', 'New admin user has been added');
            add_admin_form.reset();
            get_all_admins();
        }
        else {
            showAlert('error', 'No changes have been made');
        }
    }
    xhr.send(data);

}

function get_all_admins() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/admins.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('admin-data').innerHTML = this.responseText;
    }
    xhr.send('get_all_admins');
}

let edit_admin_form = document.getElementById('edit_admin_form');

function edit_details(sr_no) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/admins.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        let data = JSON.parse(this.responseText);
        edit_admin_form.elements['adminuser'].value = data.admindata.adminuser;
        edit_admin_form.elements['adminpass'].value = data.admindata.adminpass;
        edit_admin_form.elements['sr_no'].value = data.admindata.sr_no;
    }
    xhr.send('get_admin=' + sr_no);
}

edit_admin_form.addEventListener('submit', function (e) {
    e.preventDefault();
    submit_edit_admin();
});


function submit_edit_admin() {
    let data = new FormData();
    data.append('adminuser', edit_admin_form.elements['adminuser'].value);
    data.append('adminpass', edit_admin_form.elements['adminpass'].value);
    data.append('sr_no', edit_admin_form.elements['sr_no'].value);
    data.append('edit_admin', '');
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/admins.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('edit-admin');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            showAlert('success', 'Admin data has been updated');
            edit_admin_form.reset();
            get_all_admins();
        }
        else {
            showAlert('error', 'No changes have been made');
        }
    }
    xhr.send(data);
}



function remove_admin(val) {
    showConfirm("Are you sure you want to delete this room?",
        () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/admins.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.responseText == 1) {
                    showAlert('success', 'This admin has been removed');
                    get_all_admins();
                }
                else {
                    showAlert('error', 'No changes have been made');
                }
            }
            xhr.send('remove_admin=' + val);
        },
        () => {
            // Do nothing when canceled
        }
    );
}
window.onload = function () {
    get_all_admins();
}
