
document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    const cartItemsList = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    let cart = [];

    addToCartButtons.forEach((button) => {
        console.log(button.dataset);
        button.addEventListener("click", addToCart);
    });

    function addToCart(event) {
        console.log("Add to cart button clicked!");
        const flowerId = event.target.dataset.flowerId;
        const flowerName = event.target.dataset.flowerName;
        const flowerPrice = parseFloat(event.target.dataset.flowerPrice);

        // Add the flower to the cart array
        cart.push({
            id: flowerId,
            name: flowerName,
            price: flowerPrice
        });

        // Update the cart view
        updateCartView();

        // Optionally, you can update the UI to show that the flower has been added to the cart
        alert(`Added ${flowerName} to the cart!`);
    }

    function updateCartView() {
        // Clear the existing cart items
        cartItemsList.innerHTML = "";

        // Display each item in the cart
        cart.forEach((item) => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
            cartItemsList.appendChild(li);
        });

        // Calculate and display the total price
        const total = cart.reduce((sum, item) => sum + item.price, 0);
        cartTotal.textContent = total.toFixed(2);
    }
});
