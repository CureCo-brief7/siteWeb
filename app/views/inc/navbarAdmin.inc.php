<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?=URLROOT?>Admin/dashboard" style="padding: 0 !important; margin: 0 !important; width: 67px !important;">
            <img src="<?=URLROOT?>img/CureCo.png" alt="logo" style="width: 100% !important; height: 100% !important;">
        </a>
        <div class="social-media order-lg-last">
            <p class="mb-0 d-flex">
                <a title="<?=$data['name']?>" href="<?=URLROOT . $data['loginLogout']?>" class="d-flex align-items-center justify-content-center">
                    <span class="fa fa-user">
                        <i class="sr-only">User</i>
                    </span>
                </a>
            </p>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto mr-md-3">
                <li class="nav-item">
                    <a href="<?=URLROOT?>Admin/dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="<?=URLROOT?>Admin/product" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="<?=URLROOT?>Admin/member" class="nav-link">Users</a>
                </li>
            </ul>
        </div>
    </div>
</nav>