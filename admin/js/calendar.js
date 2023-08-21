// document.addEventListener("DOMContentLoaded", function () {
//     const prevButton = document.getElementById('prev-button');
//     const nextButton = document.getElementById('next-button');
//     let startDate = new Date();

//     prevButton.addEventListener('click', () => {
//         startDate.setDate(startDate.getDate() - 7); // Move back 7 days (one week)
//         updateCalendar(startDate);
//     });

//     nextButton.addEventListener('click', () => {
//         startDate.setDate(startDate.getDate() + 7); // Move forward 7 days (one week)
//         updateCalendar(startDate);
//     });
    
//     // Initial calendar display
//     updateCalendar(startDate);
// });

// function fetchCalendarData(startDate) {
//     const endDate = new Date(startDate);
//     endDate.setDate(endDate.getDate() + 9); // Set the end date 10 days from the start date
//     const formattedStartDate = startDate.toISOString();
//     const formattedEndDate = endDate.toISOString();
    
//     fetch(`logic/calendar.php?startDate=${formattedStartDate}&endDate=${formattedEndDate}`)
//         .then(response => response.json())
//         .then(data => {
//             displayCalendar(data);
//         })
//         .catch(error => {
//             console.error('Error fetching calendar data:', error);
//         });
// }
// function displayCalendar(data) {
//     const calendarContainer = document.getElementById('calendar-container');
//     if (!calendarContainer) {
//         console.error("Calendar container not found.");
//         return;
//     }

//     calendarContainer.innerHTML = ''; // Clear the container before appending

//     const table = document.createElement('table');
//     table.classList.add('calendar');

//     const roomTypes = Object.keys(data);
//     const dates = Object.keys(data[roomTypes[0]]);

//     // Create header row for dates
//     const headerRow = document.createElement('tr');

//     // Create an empty cell for the first column
//     const emptyCell = document.createElement('th');
//     headerRow.appendChild(emptyCell);

//     for (let date of dates) {
//         const headerCell = document.createElement('th');
//         headerCell.textContent = date;
//         headerRow.appendChild(headerCell);
//     }

//     table.appendChild(headerRow);

//     // Create rows for each room type
//     for (let roomType of roomTypes) {
//         const roomRow = document.createElement('tr');
//         const roomCell = document.createElement('td');
//         roomCell.textContent = roomType;
//         roomRow.appendChild(roomCell);

//         for (let date of dates) {
//             const cell = document.createElement('td');
//             const bookings = data[roomType][date];

//             if (bookings && bookings.length > 0) {
//                 for (let i = 0; i < bookings.length; i++) {
//                     const booking = bookings[i];
//                     // const bookingText = booking.status === 'pending' ? 'Pending' : (booking.status === 'booked' ? 'Booking' : 'Completed');
//                     const bookingText = booking.status === 'pending' ? 'Pending' : (booking.status === 'booked' ? 'Booking' : 'Completed');

//                     const bookingCell = document.createElement('div');
//                     bookingCell.textContent = bookingText;
//                     bookingCell.classList.add(booking.status);
//                     if (booking.status === 'booked' || booking.status === 'pending' || booking.status ==='completed') {
//                         bookingCell.addEventListener('click', () => showPopup(booking.orderId));
//                     }
//                     cell.appendChild(bookingCell);
//                 }
//             } else {
//                 cell.textContent = 'Vacant'; // Or any other suitable placeholder
//             }

//             roomRow.appendChild(cell);
//         }

//         table.appendChild(roomRow);
//     }

//     calendarContainer.appendChild(table);
// }


// function showPopup(orderId) {
//     showAlert('success',`Booking Order ID: ${orderId}`);
// }

// function updateCalendar(startDate) {
//     fetchCalendarData(startDate);
// }


//     // prevButton.addEventListener('click', () => {
//     //     console.log('Previous button clicked'); // Check if the button click event is triggered
//     //     startDate.setDate(startDate.getDate() - 7); // Move back 7 days (one week)
//     //     console.log('New startDate:', startDate); // Check the updated startDate
//     //     updateCalendar(startDate);
//     // });
    
//     // nextButton.addEventListener('click', () => {
//     //     console.log('Next button clicked'); // Check if the button click event is triggered
//     //     startDate.setDate(startDate.getDate() + 7); // Move forward 7 days (one week)
//     //     console.log('New startDate:', startDate); // Check the updated startDate
//     //     updateCalendar(startDate);
//     // });

document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    let startDate = new Date();

    prevButton.addEventListener('click', () => {
        startDate.setDate(startDate.getDate() - 16); // Move back 7 days (one week)
        updateCalendar(startDate);
    });

    nextButton.addEventListener('click', () => {
        startDate.setDate(startDate.getDate() + 16); // Move forward 7 days (one week)
        updateCalendar(startDate);
    });

    // Initial calendar display
    updateCalendar(startDate);
});

function fetchCalendarData(startDate) {
    const endDate = new Date(startDate);
    endDate.setDate(endDate.getDate() + 16); // Set the end date 6 days from the start date (for a total of 7 days)
    const formattedStartDate = startDate.toISOString();
    const formattedEndDate = endDate.toISOString();

    fetch(`logic/calendar.php?startDate=${formattedStartDate}&endDate=${formattedEndDate}`)
        .then(response => response.json())
        .then(data => {
            displayCalendar(data);
        })
        .catch(error => {
            console.error('Error fetching calendar data:', error);
        });
}

function displayCalendar(data) {
    const calendarContainer = document.getElementById('calendar-container');
    if (!calendarContainer) {
        console.error("Calendar container not found.");
        return;
    }

    calendarContainer.innerHTML = ''; // Clear the container before appending

    const table = document.createElement('table');
    table.classList.add('calendar');

    const roomTypes = Object.keys(data);
    const dates = Object.keys(data[roomTypes[0]]);

    // Create header row for dates
    const headerRow = document.createElement('tr');

    // Create an empty cell for the first column
    const emptyCell = document.createElement('th');
    headerRow.appendChild(emptyCell);

    for (let date of dates) {
        const headerCell = document.createElement('th');
        headerCell.textContent = date;
        headerRow.appendChild(headerCell);
    }

    table.appendChild(headerRow);

    // Create rows for each room type
    for (let roomType of roomTypes) {
        const roomRow = document.createElement('tr');
        const roomCell = document.createElement('td');
        roomCell.textContent = roomType;
        roomRow.appendChild(roomCell);

        for (let date of dates) {
            const cell = document.createElement('td');
            const bookings = data[roomType][date];

            // if (bookings && bookings.length > 0) {
            //     for (let i = 0; i < bookings.length; i++) {
            //         const booking = bookings[i];
            //         const bookingText = booking.status === 'pending' ? 'Pending' : (booking.status === 'booked' ? 'Booking' : 'Completed');

            //         const bookingCell = document.createElement('div');
            //         bookingCell.textContent = bookingText;
            //         bookingCell.classList.add(booking.status);
            //         if (booking.status === 'booked' || booking.status === 'pending' || booking.status === 'completed') {
            //             bookingCell.addEventListener('click', () => showPopup(booking.orderId));
            //         }
            //         cell.appendChild(bookingCell);
            //     }
            // } 
            if (bookings && bookings.length > 0) {
                for (let i = 0; i < bookings.length; i++) {
                    const booking = bookings[i];
                    let bookingText = '';

                    if (booking.status === 'pending') {
                        bookingText = 'Pending';
                    } else if (booking.status === 'booked') {
                        bookingText = 'Booked';
                    } else if (booking.status === 'completed') {
                        bookingText = 'Completed';
                    } else if (booking.status === 'cancelled') {
                        cell.textContent = 'Vacant';
                    }

                    const bookingCell = document.createElement('div');
                    bookingCell.textContent = bookingText;
                    bookingCell.classList.add(booking.status);
                    if (booking.status === 'booked' || booking.status === 'pending' || booking.status === 'completed') {
                        bookingCell.addEventListener('click', () => showPopup(booking.orderId));
                    }
                    cell.appendChild(bookingCell);
                }
            }
            else {
                cell.textContent = 'Vacant'; // Or any other suitable placeholder
            }

            roomRow.appendChild(cell);
        }

        table.appendChild(roomRow);
    }

    calendarContainer.appendChild(table);
}

function showPopup(orderId) {
    showAlert('success',`Booking Order ID: ${orderId}`);
}

function updateCalendar(startDate) {
    fetchCalendarData(startDate);
}
