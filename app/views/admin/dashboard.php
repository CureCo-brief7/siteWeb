<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php'
    ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-md-3">
            <a href="<?= URLROOT ?>admin/member">
                <div class="card-counter info">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">
                        <?= $data2['usersMember'] ?>
                    </span>
                    <span class="count-name">Users</span>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= URLROOT ?>admin/product">
                <div class="card-counter primary">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="count-numbers">
                        <?= $data2['productMember'] ?>
                    </span>
                    <span class="count-name">Products</span>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="<?= URLROOT ?>admin/product">
                <div class="card-counter" style="background-color: aqua;">
                    <i class="fa fa-money-bill-1-wave"></i>
                    <span class="count-numbers" style="color: white;">
                        <?= $data2['Price'] ?> DH
                    </span>
                    <span class="count-name" style="color: #7cbafe;">Prix</span>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= URLROOT ?>admin/showProduct/<?= $data2['MinPrix']->id_p ?>">
                <div class="card-counter danger">
                    <i class="fa fa-money-bill-1-wave"></i>
                    <span class="count-numbers">
                        <?= $data2['MinPrix']->Price ?> DH
                    </span>
                    <span class="count-name">Min Prix</span>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= URLROOT ?>admin/showProduct/<?= $data2['MinPrix']->id_p ?>">
                <div class="card-counter success">
                    <i class="fa fa-money-bill-1-wave"></i>
                    <span class="count-numbers">
                        <?= $data2['MaxPrix']->Price ?> DH
                    </span>
                    <span class="count-name">Max Prix</span>
                </div>
            </a>
        </div>
    </div>
    <?php include_once APPROOT . '/views/inc/footer.inc.php' ?>