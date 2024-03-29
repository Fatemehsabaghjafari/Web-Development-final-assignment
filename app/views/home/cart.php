<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="views/home/style.css">
    <style> 
    <?php include 'style.css'; ?>
    </style> 
</head>

<body>
    
<?php include __DIR__ . '/../header.php'; ?>

<main class="container mt-5 cart-container">
    <h2 class="cartHeader" >Cart Items</h2>

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
        <tbody class="tbody" >
        <?php foreach ($cartItems as $item): ?>
        <tr>
        
            <td><?= $item->name ?></td>
            <td>
                <input type="number" min="1" value="<?= $item->quantity ?>" id="quantity_<?= $item->id ?>">
            </td>
            <td>€<?= $item->price ?></td>
            <td>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(<?= $item->id ?>, 1)">+</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifyQuantity(<?= $item->id ?>, -1)">-</button>
            </td>
            <td>
                <button class="btn btn-sm btn-outline-danger" onclick="removeItem(<?= $item->id ?>);">Remove</button>
            </td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt-3">
    <h4>Total Amount: <span id="totalAmount">€<?php echo number_format($totalAmount, 2); ?></span></h4>
    
    </div>
</main>
<footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="views/javascript/script.js"></script>

</body>

</html>