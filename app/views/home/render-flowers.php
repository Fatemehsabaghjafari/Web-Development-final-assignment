<?php
require_once __DIR__ . '/../../repositories/cartrepository.php';

if (!empty($flowers)) {
    foreach ($flowers as $flower) {
        ?>
        <div class="col-md-4 col-sm-6 col-12 mb-4">
            <form method="post" action="">
                <div class="card">
                    <img src="<?= $flower->image_url ?>" class="card-img-top" alt="<?= $flower->name ?> Image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $flower->name ?></h5>
                        <p class="card-text"><small>€<?= $flower->price ?></small></p>
                        <input type="hidden" name="product_name" value="<?= $flower->name ?>">
                        <input type="hidden" name="product_price" value="<?= $flower->price ?>">
                        <input type="submit" name="add_to_cart" value="Add to Cart">

                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}


$cartRepository = new \App\Repositories\CartRepository();

if (isset($_POST['add_to_cart'])) {
    $products_quantity = 1;
    $products_name = $_POST['product_name'];
    $products_price = $_POST['product_price'];
    

    $cartRepository->insertToCart($products_quantity, $products_name, $products_price);
}

?>
