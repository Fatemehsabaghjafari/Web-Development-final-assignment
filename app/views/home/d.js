
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
        //alert(`Added ${flowerName} to the cart!`);
    }

    function updateCartView() {
        // Clear the existing cart items
        cartItemsList.innerHTML = "";

        // Display each item in the cart
        cart.forEach((item) => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - €${item.price.toFixed(2)}`;
            cartItemsList.appendChild(li);
        });

        // Calculate and display the total price
        const total = cart.reduce((sum, item) => sum + item.price, 0);
        cartTotal.textContent = total.toFixed(2);
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    const cartItemsList = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    let cart = [];

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", addToCart);
    });

    function addToCart(event) {
        const flowerId = event.target.dataset.flowerId;
        const flowerName = event.target.dataset.flowerName;
        const flowerPrice = parseFloat(event.target.dataset.flowerPrice);

        cart.push({
            id: flowerId,
            name: flowerName,
            price: flowerPrice
        });

        updateCartView();
        //alert(`Added ${flowerName} to the cart!`);
    }

    function updateCartView() {
        cartItemsList.innerHTML = "";

        cart.forEach((item, index) => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - €${item.price.toFixed(2)}`;

            // Add a styled remove button for each item
            const removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.classList.add("remove-button"); // Add the new class
            removeButton.addEventListener("click", () => removeFromCart(index));

            li.appendChild(removeButton);
            cartItemsList.appendChild(li);
        });

        const total = cart.reduce((sum, item) => sum + item.price, 0);
        cartTotal.textContent = total.toFixed(2);
    }

    function removeFromCart(index) {
        // Remove the item from the cart array
        cart.splice(index, 1);
        updateCartView();
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    const cartItemsList = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    let cart = [];

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", addToCart);
    });

    function addToCart(event) {
        const flowerId = event.target.dataset.flowerId;
        const flowerName = event.target.dataset.flowerName;
        const flowerPrice = parseFloat(event.target.dataset.flowerPrice);

        // Check if the item is already in the cart
        const existingItem = cart.find((item) => item.id === flowerId);

        if (existingItem) {
            // If the item already exists, increase its quantity
            existingItem.quantity += 1;
        } else {
            // If the item is not in the cart, add it with quantity 1
            cart.push({
                id: flowerId,
                name: flowerName,
                price: flowerPrice,
                quantity: 1
            });
        }

        updateCartView();
        alert(`Added ${flowerName} to the cart!`);
    }

    function updateCartView() {
        cartItemsList.innerHTML = "";

        cart.forEach((item, index) => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - Quantity: ${item.quantity} - €${(item.price * item.quantity).toFixed(2)}`;

            // Add "Add" button for each item
            const addButton = document.createElement("button");
            addButton.textContent = "Add";
            addButton.addEventListener("click", () => addToCartAgain(index));

            // Add "Remove" button for each item
            const removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", () => removeFromCart(index));

            li.appendChild(addButton);
            li.appendChild(removeButton);
            cartItemsList.appendChild(li);
        });

        const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        cartTotal.textContent = total.toFixed(2);
    }

    function addToCartAgain(index) {
        // Increase the quantity of the item in the cart
        cart[index].quantity += 1;
        updateCartView();
    }

    function removeFromCart(index) {
        // Decrease the quantity or remove the item from the cart array
        if (cart[index].quantity > 1) {
            cart[index].quantity -= 1;
        } else {
            cart.splice(index, 1);
        }
        updateCartView();
    }
});
