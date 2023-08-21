function get_all_booking() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/modify_booking.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        document.getElementById('booking-data').innerHTML = this.responseText;
    }
    xhr.send('get_all_booking');
}

let modify_booking_form = document.getElementById('modify_booking_form');

function edit_bookings(booking_id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/modify_booking.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        let data = JSON.parse(this.responseText);


        modify_booking_form.elements['check_in'].value = data.bookingdata.check_in;
        modify_booking_form.elements['check_out'].value = data.bookingdata.check_out;
        modify_booking_form.elements['booking_id'].value = data.bookingdata.booking_id;
    }
    xhr.send("get_booking="+booking_id)

}

modify_booking_form.addEventListener('submit', function(e){
    e.preventDefault();
    submit_booking();
});

function submit_booking(){
    let data = new FormData();
    data.append('edit_booking','');
    data.append('booking_id', modify_booking_form.elements['booking_id'].value);
    data.append('check_in', modify_booking_form.elements['check_in'].value);
    data.append('check_out', modify_booking_form.elements['check_out'].value);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "logic/modify_booking.php", true);

    xhr.onload = function(){
        var myModal = document.getElementById('modify-booking');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        console.log(this.responseText);

        if(this.responseText == 1){
            console.log(this.responseText);
            showAlert('success', 'Booking Updated');
            modify_booking_form.reset();
            get_all_booking();

        }
        else{
            console.log(this.responseText);
            showAlert('error', 'No Changes have been made');

        }
    }
    xhr.send(data);

}
window.onload = function () {
    get_all_booking();
}