// Define sendAjaxRequest in the global scope
function sendAjaxRequest(action, data, successCallback) {
    $.ajax({
        type: 'POST',
        url: '/api/cart',
        data: { action, ...data },
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

// Define removeItem in the global scope
function removeItem(itemId) {
    sendAjaxRequest('removeItem', { itemId }, function (result) {
        // Handle success, e.g., remove the item from the frontend
        console.log(result.message);
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
