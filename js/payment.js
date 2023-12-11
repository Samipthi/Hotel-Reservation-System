// payment.js

function displayPrice() {
    // Get all radio buttons with name 'roomType'
    var roomTypeRadios = document.getElementsByName("roomType");
    var selectedRoomType = "";

    // Loop through the radio buttons to find the selected one
    for (var i = 0; i < roomTypeRadios.length; i++) {
        if (roomTypeRadios[i].checked) {
            selectedRoomType = roomTypeRadios[i].value;
            break; // Exit the loop if a radio button is checked
        }
    }

    var priceDisplay = document.getElementById("priceDisplay");

    switch (selectedRoomType) {
        case "Standard Room":
            priceDisplay.innerText = "Price: $99 per night";
            break;
        case "Deluxe Room":
            priceDisplay.innerText = "Price: $199 per night";
            break;
        case "Family Suite":
            priceDisplay.innerText = "Price: $249 per night";
            break;
        case "Executive Penthouse":
            priceDisplay.innerText = "Price: $399 per night";
            break;
        default:
            priceDisplay.innerText = "Invalid room type";
    }
}