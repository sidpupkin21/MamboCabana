let activity_s_form = document.getElementById('activity_s_form');

activity_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    add_activity();
});

function add_activity() {
    let data = new FormData();
    data.append('name', activity_s_form.elements['activity_name'].value);
    data.append('icon', activity_s_form.elements['activity_icon'].value);
    data.append('desc', activity_s_form.elements['activity_desc'].value);
    data.append('add_activity', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/activity.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('activity-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            showAlert('success', 'New activity has been added');
            activity_s_form.elements['activity_name'].value = '';
            activity_s_form.elements['activity_icon'].value = '';
            activity_s_form.elements['activity_desc'].value = '';
            get_activity();
        }
    }
    xhr.send(data);
}

function get_activity() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/activity.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('activities-data').innerHTML = this.responseText;
    }
    xhr.send('get_activity');
}

function rem_activity(val) {
    showConfirm("Are you sure you want to delete this room?",
        () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/activity.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function () {
                if (this.responseText == 1) {
                    showAlert('success', 'This activity has been removed');
                    get_activity();
                }
                else {
                    showAlert('error', 'Activity removal has failed');
                }
            }
            xhr.send('rem_activity=' + val);
        },
        () => {
            // Do nothing when canceled
        }
    );
}

window.onload = function () {
    get_activity();
}