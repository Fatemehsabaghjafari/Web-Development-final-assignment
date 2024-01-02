<?php
foreach ($filteredFlowers as $flower) {
    ?>
    <div class="col-md-4 col-sm-6 col-12 mb-4">
        <div class="card">
            <img src="<?= $flower->image_url ?>" class="card-img-top" alt="<?= $flower->name ?> Image">
            <div class="card-body">
                <h5 class="card-title"><?= $flower->id ?></h5>
                <p class="card-text"><small><?= $flower->name ?></small></p>
                <button class="btn btn-primary">+</button>
            </div>
        </div>
    </div>
    <?php
}
?>
