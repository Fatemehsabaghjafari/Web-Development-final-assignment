document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch data from the server and update the cart items
    function fetchData() {
    fetch('http://localhost/api/cart')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            let newTotalAmount = 0;

            data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <td>${item.name}</td>
                        <td>
                            <input type="number" min="1" value="${item.quantity}" id="quantity_${item.id}">
                        </td>
                        <td>€${item.price}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(${item.id}, 1)">+</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(${item.id}, -1)">-</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-danger" onclick="removeItem(${item.id});">Remove</button>
                        </td>
                `;
                tbody.appendChild(row);

                // Update the total amount
                newTotalAmount += item.quantity * item.price;

            });

            // Update the total amount in the HTML
            const totalAmountElement = document.getElementById('totalAmount');
            totalAmountElement.textContent = `€${newTotalAmount.toFixed(2)}`;
        })
        .catch(error => console.error('Error fetching data:', error));
        //updateCartItemCount();
}
     // Function to update cart item count
     function updateCartItemCount() {
        fetch('http://localhost/api/cart')
            .then(response => response.text())
            .then(count => {
                // Update the cart item count on the page
                const cartItemCountElement = document.getElementById('cartItemCount');
                cartItemCountElement.textContent = count;
            })
            .catch(error => console.error('Error updating cart item count:', error));
    }

    // Call fetchData when the page loads
    fetchData();

// Function to modify the quantity of an item
window.modifyQuantity = function(itemId, amount) {
    // Get the current quantity value
    let inputElement = document.getElementById('quantity_' + itemId);
    let currentQuantity = parseInt(inputElement.value);

    // Update the input field with the new quantity (current + change)
    inputElement.value = currentQuantity + amount;

    fetch('http://localhost/api/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            action: 'modifyQuantity',
            itemId: itemId,
            change: currentQuantity + amount,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Quantity modified successfully, update the cart items
            fetchData();
        } else {
            console.error('Error modifying quantity:', data.message);
        }
    })
    .catch(error => console.error('Error modifying quantity:', error));
};

    // Function to remove an item from the cart
    window.removeItem = function(itemId) {
        fetch('http://localhost/api/cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'removeItem',
                itemId: itemId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Item removed successfully, update the cart items
                fetchData();
            } else {
                console.error('Error removing item:', data.message);
            }
        })
        .catch(error => console.error('Error removing item:', error));
    };

    // Function to initiate checkout
    window.checkout = function() {
        // Implement your logic for checkout
    };
});