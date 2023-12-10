// payment.js

function displayPrice() {
    var roomType = document.getElementById("roomType").value;
    var priceDisplay = document.getElementById("priceDisplay");

    switch (roomType) {
        case "standard":
            priceDisplay.innerText = "Price: $99 per night";
            break;
        case "deluxe":
            priceDisplay.innerText = "Price: $199 per night";
            break;
        case "family":
            priceDisplay.innerText = "Price: $249 per night";
            break;
        case "executive":
            priceDisplay.innerText = "Price: $399 per night";
            break;
        default:
            priceDisplay.innerText = "Invalid room type";
    }
}
