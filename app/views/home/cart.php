<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include __DIR__ . '/../header.php'; ?>
</head>

<style>
    <?php include 'style.css'; ?>
</style>

<body>

<main class="container mt-5">
        <h2>Cart Items</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Modify Quantity</th>
                    <th scope="col">Remove Item</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include CartRepository
                require_once __DIR__ . '/../../repositories/cartrepository.php';

                // Create an instance of CartRepository
                $cartRepository = new \App\Repositories\CartRepository();

                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
                    // Check if the action is to update the quantity
                    if ($_POST['action'] === 'update_quantity' && isset($_POST['item_id']) && isset($_POST['new_quantity'])) {
                        $itemId = $_POST['item_id'];
                        $newQuantity = $_POST['new_quantity'];

                        // Update quantity in the database
                        $cartRepository->updateQuantity($itemId, $newQuantity);

                        // Respond with a success message
                        echo "Quantity updated successfully!";
                        exit; // Terminate the script after responding
                    }
                    // Check if the action is to remove the item
                    elseif ($_POST['action'] === 'remove_item' && isset($_POST['item_id'])) {
                        $itemId = $_POST['item_id'];

                        // Remove the item from the cart
                        $cartRepository->removeItem($itemId);

                        // Respond with a success message
                        echo "Item removed from the cart!";
                        exit; // Terminate the script after responding
                    }
                
                }

                // Get all items in the cart
                $cartItems = $cartRepository->getAllCartItems();

                if (!empty($cartItems)) {
                    foreach ($cartItems as $item) {
                        echo '<tr>';
                        echo '<td>' . $item->name . '</td>';
                        echo '<td>';
                        echo '<input type="number" min="1" value="' . $item->quantity . '" id="quantity_' . $item->id . '">';
                        echo '</td>';
                        echo '<td>€' . $item->price . '</td>';
                        echo '<td>';
                        echo '<button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(' . $item->id . ', 1)">+</button>';
                        echo '<button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(' . $item->id . ', -1)">-</button>';
                        echo '</td>';
                        echo '<td><button class="btn btn-sm btn-outline-danger" onclick="removeItem(' . $item->id . ')">Remove</button></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No items in the cart</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </main>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
