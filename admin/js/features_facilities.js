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
        //console.log(this.responseText);
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            //console.log(this.responseText);
            alert('success', 'New Feature has been added');
            feature_s_form.elements['feature_name'].value = '';
            feature_s_form.elements['feature_icon'].value;
            get_features();
        } else {
            alert('error', 'No changes have been made!!');
        }
    }
    xhr.send(data);
}

function get_features() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        //console.log(this.responseText);
        document.getElementById('features-data').innerHTML = this.responseText;
    }
    xhr.send('get_features');
}

function rem_feature(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        //console.log(this.responseText);
        if (this.responseText == 1) {
            alert('success', 'This Feature has been removed!');
            get_features();
        }
        // } else if (this.responseText == 'room_added') {
        //     alert('error', 'Feature is added in room!');
        // }
        else {
            alert('error', 'No changes have been made');
        }
    }

    xhr.send('rem_feature=' + val);
}
facility_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_facility();
});

function add_facility()
{
    let data = new FormData();
    data.append('name', facility_s_form.elements['facility_name'].value);
    data.append('icon', facility_s_form.elements['facility_icon'].value);
    data.append('desc', facility_s_form.elements['facility_desc'].value);
    data.append('add_facility','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide()

        if(this.responseText == 1){
            //console.log(this.responseText);
            alert('success', 'New Facility has been added');
            facility_s_form.elements['facility_name'].value = '';
            facility_s_form.elements['facility_icon'].value = '';
            facility_s_form.elements['facility_desc'].value = '';
            get_facilities();
        }
        else {
            alert('error', 'No changes have been made!!');
            facility_s_form.reset();
        }
    }
    xhr.send(data);

}

function get_facilities(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        //console.log(this.responseText);
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }
    xhr.send('get_facilities');

}

function rem_facility(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText ==1){
            alert('success', 'This facility had been removed!');
            get_facilities();
        }
        else{
            alert('error', 'no changes have been made');
        }
    }
    xhr.send('rem_facility='+val);
}
window.onload = function () {
    get_features();
    get_facilities();
}