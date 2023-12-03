// Simulated room data (replace with real data from a backend)
const rooms = [
    { id: 1, name: "Single Room", price: 100 },
    { id: 2, name: "Double Room", price: 150 },
    { id: 3, name: "Suite", price: 250 }
];

// Function to generate room listings
function generateRoomList() {
    const roomList = document.getElementById("room-list");
    roomList.innerHTML = "";
    rooms.forEach(room => {
        const roomItem = document.createElement("div");
        roomItem.innerHTML = `
            <h3>${room.name}</h3>
            <p>Price: $${room.price}/night</p>
            <button onclick="bookRoom(${room.id})">Book Now</button>
        `;
        roomList.appendChild(roomItem);
    });
}

// Function to book a room (simulated, replace with backend logic)
function bookRoom(roomId) {
    const name = document.getElementById("name").value;
    const checkIn = document.getElementById("check-in").value;
    const checkOut = document.getElementById("check-out").value;
    alert(`Booking: ${name}, Room ID: ${roomId}, Check-in: ${checkIn}, Check-out: ${checkOut}`);
}

generateRoomList();
