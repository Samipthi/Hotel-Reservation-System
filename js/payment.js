// payment.js

function displayPrice() {
    var roomType = document.getElementById("roomType").value;
    var priceDisplay = document.getElementById("priceDisplay");

    switch (roomType) {
        case "Standard Room":
            priceDisplay.innerText = "Price: $99 per night";
            break;
        case "Deluxe Suite":
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
