<?php
if (!empty($filteredFlowers)) {
    foreach ($filteredFlowers as $filteredFlower) {
        ?>     
        <div class="col-md-4 col-sm-6 col-12 mb-4">

        <?php
             if(isset($display_message)){
             echo "<div class='display_message'>
             <span>$display_message</span>
             <i class='fas fa-times' onClick='this.parentElement.style.display=`none`;'></i>
            </div>";
             }   
         ?>

            <form method="post" action="">
                <div class="card">
                    <img src="<?= $filteredFlower->image_url ?>" class="card-img-top" alt="<?= $filteredFlower->name ?> Image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $filteredFlower->name ?></h5>
                        <p class="card-text"><small>€<?= $filteredFlower->price ?></small></p>
                        <input type="hidden" name="product_name" value="<?= $filteredFlower->name ?>">
                        <input type="hidden" name="product_price" value="<?= $filteredFlower->price ?>">
                        <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to Cart">

                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}

?>
