const header = document.querySelector("header");

window.addEventListener("scroll", function() {
    header.classList.toggle("sticky", window.scrollY > 80)
});
document.addEventListener('DOMContentLoaded', () => {
    const orderButtons = document.querySelectorAll('.order-btn');
    const cartCount = document.getElementById('cart-count');

    let cartItems = [];

    // Add event listener to order buttons
    orderButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.parentElement.dataset.itemId;
            const itemName = button.parentElement.querySelector('h3').innerText;

            // Add item to cartItems array
            cartItems.push({ id: itemId, name: itemName });

            // Update cart count
            cartCount.textContent = cartItems.length;
        });
    });

    // Fetch the last item ordered from cartItems (assuming it's the most recent one)
    function getLastOrderedItem() {
        if (cartItems.length > 0) {
            const lastItem = cartItems[cartItems.length - 1];
            return lastItem.name;
        }
        return "No recent orders";
    }

    // Example usage: Display the last ordered item
    const lastOrderedItem = getLastOrderedItem();
    console.log(`Last Ordered Item: ${lastOrderedItem}`);
});
document.addEventListener('DOMContentLoaded', () => {
    const orderButtons = document.querySelectorAll('.order-btn');
    const reserveButton = document.querySelector('.reserve-btn');
    const cartCount = document.getElementById('cart-count');

    let cartItems = [];

    // Add event listener to order buttons
    orderButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.parentElement.dataset.itemId;
            const itemName = button.parentElement.querySelector('h3').innerText;

            // Add item to cartItems array
            cartItems.push({ id: itemId, name: itemName });

            // Update cart count
            cartCount.textContent = cartItems.length;
        });
    });

    // Event listener for table reservation button
    reserveButton.addEventListener('click', () => {
        // Perform table reservation process (e.g., redirect to reservation page)
        window.location.href = 'reservation.php'; // Change to the actual reservation page URL
    });

    // Fetch the last item ordered from cartItems (assuming it's the most recent one)
    function getLastOrderedItem() {
        if (cartItems.length > 0) {
            const lastItem = cartItems[cartItems.length - 1];
            return lastItem.name;
        }
        return "No recent orders";
    }

    // Example usage: Display the last ordered item
    const lastOrderedItem = getLastOrderedItem();
    console.log(`Last Ordered Item: ${lastOrderedItem}`);
});
