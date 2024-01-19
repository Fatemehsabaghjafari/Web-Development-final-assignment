<?php if (!empty($flowers)) {
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
                        <button class="btn btn-primary addToCartBtn" type="button">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}
?>
