<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include __DIR__ . '/../header.php'; ?>
</head>
<style>
    <?php include 'style.css'; ?>
</style>

<body>

    <div class="container mt-5">
        <div id="shopping-cart">
            <h2>Shopping Cart</h2>
            <ul id="cart-items">
                <?php if (isset($cartItems) && is_array($cartItems)) : ?>
                    <?php foreach ($cartItems as $item) : ?>
                        <li><?php echo "{$item->name} - €{$item->price}"; ?></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>No items in the cart</li>
                <?php endif; ?>
            </ul>
            <p>Total: €<span id="cart-total">0.00</span></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
