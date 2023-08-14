function get_bookings(search = '') {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/new_bookings.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        document.getElementById('table-data').innerHTML = this.responseText;
    }
    xhr.send('get_bookings&search=' + search);
}

let assign_room_form = document.getElementById('assign_room_form');

function assign_room(id) {
    assign_room_form.elements['booking_id'].value = id;
}

assign_room_form.addEventListener('submit', function (e) {
    e.preventDefault();

    let data = new FormData();
    data.append('room_no', assign_room_form.elements['room_no'].value);
    data.append('booking_id', assign_room_form.elements['booking_id'].value);
    data.append('assign_room', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/new_bookings.php", true);

    xhr.onload = function () {
        var myModal = document.getElementById('assign-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 1) {
            showAlert('success', 'Room Number has been Alloted');
            assign_room_form.reset();
            get_bookings();
        }
        else {
            showAlert('success', 'Room Number has been updated');
            get_bookings();
        }
    }
    xhr.send(data);

});

function cancel_booking(id) {
    showConfirm("Are you sure you want to cancel this booking?",
        () => {
            let data = new FormData();
            data.append('booking_id', id);
            data.append('cancel_booking', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/new_bookings.php", true);

            xhr.onload = function () {
                if(this.responseText == 1){
                    showAlert('success', 'Booking has been cancelled');
                    get_bookings();
                }
                else{
                    showAlert('error', 'This Booking has also ready been cancelled');
                }
            }
            xhr.send(data);
        },
        () => {
            // Do nothing when canceled
        }
    );
}


function approve_booking(id){
    let data = new FormData();
    data.append('booking_id', id);
    data.append('approve_booking', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/new_bookings.php", true);

    xhr.onload = function(){
        if(this.responseText == 1){
            showAlert('success', 'Booking has been approved. Client will be contacted via email');
            get_bookings();
        }
        else{
            showAlert('error', 'This Booking has also ready been approved');
        }
    }
    xhr.send(data);
}

function complete_booking(id){
    showConfirm("Are you sure you want to complete this booking? This Action CANNOT BE REVERSED",
        () => {
            let data = new FormData();
            data.append('booking_id', id);
            data.append('complete_booking', '');
        
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "logic/new_bookings.php", true);
            xhr.onload = function(){
                if(this.responseText == 1){
                    showAlert('success', 'Booking has been completed. This Action CANNOT BE REVERSED');
                    get_bookings();
                }
                else{
                    showAlert('error', "This Booking's status has already been changed.");
                }
            }
            xhr.send(data);
          
        },
        () => {
            // Do nothing when canceled
        }
    );

}
window.onload = function(){
    get_bookings();
}