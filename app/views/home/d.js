document.addEventListener("DOMContentLoaded", function () {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    const cartItemsList = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    let cart = [];

    addToCartButtons.forEach((button) => {
        button.addEventListener("click", handleAddToCart);
    });

    async function handleAddToCart(event) {
        const flowerId = event.target.dataset.flowerId;
        const flowerName = event.target.dataset.flowerName;
        const flowerPrice = parseFloat(event.target.dataset.flowerPrice);

        try {
            await addToCartOnServer(flowerId);
            updateCartView(flowerId, flowerName, flowerPrice);
            alert(`Added ${flowerName} to the cart!`);
        } catch (error) {
            alert(`Failed to add ${flowerName} to the cart.`);
            console.error(error);
        }
    }

    async function addToCartOnServer(flowerId) {
        const response = await fetch('/add-to-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                flowerId: flowerId,
                quantity: 1,
            }),
        });

        const data = await response.json();

        if (!data.success) {
            throw new Error('Failed to add to cart on the server.');
        }
    }

    function updateCartView(flowerId, flowerName, flowerPrice) {
        const existingItem = cart.find((item) => item.id === flowerId);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                id: flowerId,
                name: flowerName,
                price: flowerPrice,
                quantity: 1,
            });
        }

        cartItemsList.innerHTML = "";

        cart.forEach((item, index) => {
            const li = document.createElement("li");
            li.textContent = `${item.name} - Quantity: ${item.quantity} - €${(item.price * item.quantity).toFixed(2)}`;
            
            const addButton = createButton("+", "add-button", () => addToCartAgain(index));
            const removeButton = createButton("-", "remove-button", () => removeFromCart(index));

            li.appendChild(addButton);
            li.appendChild(removeButton);
            cartItemsList.appendChild(li);
        });

        const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        cartTotal.textContent = total.toFixed(2);
    }

    function createButton(text, className, clickHandler) {
        const button = document.createElement("button");
        button.textContent = text;
        button.classList.add(className);
        button.addEventListener("click", clickHandler);
        return button;
    }

    function addToCartAgain(index) {
        cart[index].quantity += 1;
        updateCartView();
    }

    function removeFromCart(index) {
        if (cart[index].quantity > 1) {
            cart[index].quantity -= 1;
        } else {
            cart.splice(index, 1);
        }
        updateCartView();
    }
});
