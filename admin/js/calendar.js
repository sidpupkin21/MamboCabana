// document.addEventListener("DOMContentLoaded", function () {
//     let startDate = new Date();

//     const prevButton = document.getElementById('prev-button');
//     const nextButton = document.getElementById('next-button');

//     prevButton.addEventListener('click', () => {
//         startDate.setMonth(startDate.getMonth() - 1);
//         updateCalendar(startDate);
//     });

//     nextButton.addEventListener('click', () => {
//         startDate.setMonth(startDate.getMonth() + 1);
//         updateCalendar(startDate);
//     });

//     fetchCalendarData(startDate);
// });

// function fetchCalendarData(startDate) {
//     const formattedStartDate = startDate.toISOString();
//     fetch(`logic/calendar.php?startDate=${formattedStartDate}`)
//         .then(response => response.json())
//         .then(data => {
//             displayCalendar(data);
//         })
//         .catch(error => {
//             console.error('Error fetching calendar data:', error);
//         });
// }

document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');

    let startDate = new Date();

    prevButton.addEventListener('click', () => {
        startDate.setDate(startDate.getDate() - 10); // Move back 10 days
        updateCalendar(startDate);
    });

    nextButton.addEventListener('click', () => {
        startDate.setDate(startDate.getDate() + 10); // Move forward 10 days
        updateCalendar(startDate);
    });

    // Initial calendar display
    updateCalendar(startDate);
});

function fetchCalendarData(startDate) {
    const endDate = new Date(startDate);
    endDate.setDate(endDate.getDate() + 9); // Set the end date 10 days from the start date
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
            const dayData = data[roomType][date];

            // Check if dayData is defined before accessing its properties
            if (dayData && dayData.status) {
                cell.textContent = dayData.status;
                cell.classList.add(dayData.status);
                if (dayData.status === 'booked' || dayData.status === 'pending') {
                    cell.addEventListener('click', () => showPopup(dayData.orderId));
                }
            } else {
                cell.textContent = 'N/A'; // Or any other suitable placeholder
            }

            roomRow.appendChild(cell);
        }
        table.appendChild(roomRow);
    }

    calendarContainer.appendChild(table);
}

function showPopup(orderId) {
    alert(`Booking Order ID: ${orderId}`);
}

function updateCalendar(startDate) {
    fetchCalendarData(startDate);
}
