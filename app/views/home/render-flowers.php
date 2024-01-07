<?php

if (!empty($flowers)) {
    // Process and display your search results as needed
    foreach ($flowers as $flower) {
        ?>
        <div class="col-md-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <img src="<?= $flower->image_url ?>" class="card-img-top" alt="<?= $flower->name ?> Image">
                <div class="card-body">
                    <h5 class="card-title"><?= $flower->name ?></h5>
                    <p class="card-text"><small>€<?= $flower->price ?></small></p>

                    <button class="btn btn-primary add-to-cart-btn"
                            data-flower-id="<?= $flower->id ?>"
                            data-flower-name="<?= $flower->name ?>"
                            data-flower-price="<?= $flower->price ?>">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
} 
//else {
  //  echo "No matching flowers found render.";
   // var_dump($flowers);
//}
?>
