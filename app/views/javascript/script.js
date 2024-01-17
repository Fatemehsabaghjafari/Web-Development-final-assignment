// Define sendAjaxRequest in the global scope
function sendAjaxRequest(action, data, successCallback) {
    $.ajax({
        type: 'POST',
        url: '/api/cart',
        contentType: 'application/json', // Add this line
        data: JSON.stringify({ action, ...data }), // Stringify the data
        cache: false,
        success: function (response) {
            try {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    successCallback(result);
                } else {
                    console.error(result.message);
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        },
        error: function (error) {
            console.error('AJAX Request Error:', error);
        }
    });
}
// Update viewAllCartItems function
function viewAllCartItems() {
    $.ajax({
        type: 'GET',
        url: '/api/cart',
        cache: false,
        dataType: 'json',  // Specify dataType to automatically parse JSON
        success: function (response) {
            try {
                // If the response is already an object, no need to parse it
                var result = typeof response === 'object' ? response : JSON.parse(response);

                if (result.status === 'success') {
                    // Update the HTML with the new cart items
                    updateCartItems(result.cartItems);
                } else {
                    console.error(result.message);
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        },
        error: function (error) {
            console.error('AJAX Request Error:', error);
        }
    });
}



function updateCartItems(cartItems) {
    // Clear existing table rows
    $('#cart-table tbody').empty();

    // Iterate through the received cart items and update the HTML
    $.each(cartItems, function (index, item) {
        $('#cart-table tbody').append(
            '<tr>' +
            '<td>' + item.name + '</td>' +
            '<td>' +
            '<input type="number" min="1" value="' + item.quantity + '" id="quantity_' + item.id + '">' +
            '</td>' +
            '<td>€' + item.price + '</td>' +
            '<td>' +
            '<button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(' + item.id + ', 1)">+</button>' +
            '<button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(' + item.id + ', -1)">-</button>' +
            '</td>' +
            '<td>' +
            '<button class="btn btn-sm btn-outline-danger" onclick="removeItem(' + item.id + ')">Remove</button>' +
            '</td>' +
            '</tr>'
        );
    });
}

// Define removeItem in the global scope
function removeItem(itemId) {
    sendAjaxRequest('removeItem', { itemId }, function (result) {
        // Handle success, e.g., remove the item from the frontend
        console.log(result.message);
        
        // Fetch and update the cart items after removing an item
        viewAllCartItems();
    });
}



function modifyQuantity(itemId, change) {
    // Get the current quantity value
    let currentQuantity = parseInt($('#quantity_' + itemId).val());

    // Update the input field with the new quantity (current + change)
    $('#quantity_' + itemId).val(currentQuantity + change);

    // Call the sendAjaxRequest function with the updated quantity
    sendAjaxRequest('modifyQuantity', { itemId, change: currentQuantity + change }, function (result) {
        // Handle success, e.g., update the quantity on the frontend
        console.log(result.message);
        viewAllCartItems();
       
    });
}

// Assuming you're using jQuery for AJAX calls
$(document).ready(function () {
    
    // Use event delegation for dynamically created buttons
    $(document).on('click', '.btn-modify-quantity', function () {
        var itemId = $(this).data('itemid');
        var change = $(this).data('change');
        modifyQuantity(itemId, change);
    });

    $(document).on('click', '.btn-remove-item', function () {
        var itemId = $(this).data('itemid');
        removeItem(itemId);
       
    });

    $(document).on('click', '.btn-checkout', function () {
        checkout();
    });
});

// Function to navigate to the checkout page
function checkout() {
    window.location.href = '/login';
}


