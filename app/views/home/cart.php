<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include __DIR__ . '/../header.php'; ?>
    <style>
    <?php include 'style.css'; ?>
    </style>
</head>

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
            ?>
        </tbody>
    </table>
    <div class="mt-3">
        <h4>Total Amount: €<?php echo number_format($totalAmount, 2); ?></h4>
        <button class="btn btn-primary" onclick="checkout()">Login to continue checkout</button>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>