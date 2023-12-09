function checkAvailability() {
    // Your JavaScript logic for checking availability goes here...

    // Update the availabilityResult and roomPrice elements
    document.getElementById('availabilityResult').innerText = 'Rooms available!';

    let roomType = document.getElementById('roomType').value;
    let price = getPriceByRoomType(roomType);
    document.getElementById('roomPrice').innerText = `Price: $${price}`;
}

function getPriceByRoomType(roomType) {
    // Replace this with your logic to fetch price from the server/database
    // For example, you might have a predefined array or make an AJAX request
    // to fetch the price based on the selected room type.
    switch (roomType) {
        case 'single':
            return 100;
        case 'double':
            return 150;
        case 'suite':
            return 200;
        default:
            return 0;
    }
}
