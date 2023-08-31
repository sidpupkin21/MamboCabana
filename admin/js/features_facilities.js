let feature_s_form = document.getElementById('feature_s_form');
let facility_s_form = document.getElementById('facility_s_form');

feature_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_feature();
});

function add_feature() {
    let data = new FormData();
    data.append('name', feature_s_form.elements['feature_name'].value);
    data.append('icon', feature_s_form.elements['feature_icon'].value);
    data.append('add_feature', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            showAlert('success', 'New Feature has been added');
            feature_s_form.elements['feature_name'].value = '';
            feature_s_form.elements['feature_icon'].value;
            get_features();
        } else {
            showAlert('error', 'No changes have been made');
        }
    }
    xhr.send(data);
}

function get_features() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('features-data').innerHTML = this.responseText;
    }
    xhr.send('get_features');
}

function rem_feature(val) {
    showConfirm("Are you sure you want to delete this room?",
        () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.responseText == 1) {
                    showAlert('success', 'This feature has been removed');
                    get_features();
                }
                // else if (this.responseText == 'room_added') {
                //     showAlert('error', 'Feature is added in room!');
                // }
                else {
                    showAlert('error', 'Feature removal has failed');
                }
            }

            xhr.send('rem_feature=' + val);
        },
        () => {
            // Do nothing when canceled
        }
    );
}
facility_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_facility();
});

function add_facility() {
    let data = new FormData();
    data.append('name', facility_s_form.elements['facility_name'].value);
    data.append('icon', facility_s_form.elements['facility_icon'].value);
    data.append('desc', facility_s_form.elements['facility_desc'].value);
    data.append('add_facility', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            showAlert('success', 'New facility has been added');
            facility_s_form.elements['facility_name'].value = '';
            facility_s_form.elements['facility_icon'].value = '';
            facility_s_form.elements['facility_desc'].value = '';
            get_facilities();
        }
        else {
            showAlert('error', 'No changes have been made');
            facility_s_form.reset();
        }
    }
    xhr.send(data);

}

function get_facilities() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }
    xhr.send('get_facilities');

}

function rem_facility(val) {
    showConfirm("Are you sure you want to delete this room?",
        () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/features_facilities.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.responseText == 1) {
                    showAlert('success', 'This facility had been removed');
                    get_facilities();
                }
                else {
                    showAlert('error', 'Facility removal has failed');
                }
            }
            xhr.send('rem_facility=' + val);
        },
        () => {
            // Do nothing when canceled
        }
    );
}
window.onload = function () {
    get_features();
    get_facilities();
}