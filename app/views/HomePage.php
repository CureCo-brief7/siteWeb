<?php
$noNavbarAdmin = '';
include_once APPROOT . '/views/inc/header.inc.php';
?>

<div class="container gallery-container">

    <h1>CureCo Gallery</h1>

    <p class="page-description text-center">Grid Layout With Zoom Effect</p>
    
    <div class="tz-gallery">

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/park.jpg">
                    <img src="<?=URLROOT?>img/park.jpg" alt="Park">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/bridge.jpg">
                    <img src="<?=URLROOT?>img/bridge.jpg" alt="Bridge">
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/tunnel.jpg">
                    <img src="<?=URLROOT?>img/tunnel.jpg" alt="Tunnel">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/coast.jpg">
                    <img src="<?=URLROOT?>img/coast.jpg" alt="Coast">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/rails.jpg">
                    <img src="<?=URLROOT?>img/rails.jpg" alt="Rails">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/traffic.jpg">
                    <img src="<?=URLROOT?>img/traffic.jpg" alt="Traffic">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/rocks.jpg">
                    <img src="<?=URLROOT?>img/rocks.jpg" alt="Rocks">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/benches.jpg">
                    <img src="<?=URLROOT?>img/benches.jpg" alt="Benches">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="<?=URLROOT?>img/sky.jpg">
                    <img src="<?=URLROOT?>img/sky.jpg" alt="Sky">
                </a>
            </div>
        </div>

    </div>

</div>


<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>