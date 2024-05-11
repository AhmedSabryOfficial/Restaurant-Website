const header = document.querySelector("header");

window.addEventListener("scroll", function () {
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
function validateForm() {
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (email == "") {
        alert("Email must be filled out");
        return false;
    }
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    return true;
}
function validateForm22() {
    var fullName = document.forms["registrationForm"]["fullname"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var repeatPassword = document.forms["registrationForm"]["repeat_password"].value;

    if (fullName === "") {
        alert("Full Name must be filled out");
        return false;
    }
    if (email === "") {
        alert("Email must be filled out");
        return false;
    }
    if (!validateEmail(email)) {
        alert("Please enter a valid email address");
        return false;
    }
    if (password === "") {
        alert("Password must be filled out");
        return false;
    }
    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }
    if (repeatPassword === "") {
        alert("Repeat Password must be filled out");
        return false;
    }
    if (password !== repeatPassword) {
        alert("Passwords do not match");
        return false;
    }
    return true;
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}