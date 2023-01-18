<?php
$noNavbarAdmin = '';
include_once APPROOT . '/views/inc/header.inc.php';
?>

<div class="container gallery-container">

    <h1>CureCo Gallery</h1>

    <p class="page-description text-center">Grid Layout With Zoom Effect</p>

    <div class="tz-gallery">

        <div class="row">
            <?php foreach ($data2['products'] as $product): ?>
                <div class="col-sm-6 col-md-4">
                    <a class="lightbox" href="<?= URLROOT . "img/" . $product->Image ?>">
                        <img src="<?= URLROOT . "img/" . $product->Image ?>" alt="Park">
                    </a>
                </div>
            <?php endforeach ?>
        </div>

    </div>

</div>


<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>