let feature_s_form = document.getElementById('feature_s_form');
let facility_s_form = document.getElementById('facility_s_form');

feature_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_feature();
});

function add_feature() {
    let data = new FormData();
    data.append('name', feature_s_form.elements['feature_name'].value);
    data.append('add_feature', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/feature_facilities.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert('success', 'New feature added');
            feature_s_form.elements['feature_name'].value = '';
            get_features();
        }
        else {
            alert('error', 'Server is down');
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
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'appplication/x-www-form-urlencoded');

    xhr.onload = function () {
        if (this.responseText == 1) {

            alert('success', "feature is removed");
            get_features();
        }
        else if (this.responseText == 'room_added'){
            alert('error', 'feature is added in room');
        }
        else {
            alert('error', 'Server down');
        }
    }

    xhr.send('rem_feature='+val);
}


facility_s_form.addEventListener('submit', function(e){
    e.preventDefault();
    add_facility();
});

function add_facility(){
    let data = new FormData();
    data.append('name', facility_s_form.elements['facility_name'].value);
    data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
    data.append('desc', facility_s_form.elements['facility_desc'].value);
    data.append('add_facility', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php",true);

    xhr.onload = function(){
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText == 'inv_img'){
            alert('error', 'Please only use the following formats(SVG, PNG, JPEG, JPG)');

        }
        else if(this.responseText == 'inv_size'){
            alert('error', 'Image size should be below 10MB');
        }
        else if(this.responseText == 'upd_failed'){
            alert('error', 'Image upload has failed. Please check if the server is funcitonal');

        }
        else{
            alert('success', 'New facility has been added');
            facility_s_form.reset();
            get_facilities();
        }
    }
    xhr.send(data);

}

function get_facilities(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }

    xhr.send('get_facilities');
}


function rem_facility(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/features_facilities.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText == 1){
            alert('success', 'facility has been removed');
            get_facilities();

        }
        else if (this.responseText == 'room_added'){
            alert('error','facility is added to the room!');
        }
        else {
            alert('error', 'Please check if server is funcitonal');

        }
    }

    xhr.send('rem_facility='+val);
}

window.onload = function(){
    get_features();
    get_facilities();
}