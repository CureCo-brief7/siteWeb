<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php';
?>
<div class="body">
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Add Product</h3>
                <div class="card2">
                    <form class="form-card" enctype="multipart/form-data" method="post" action="<?=URLROOT?>Admin/productAdd">
                        <div id="addProductAdd"></div>
                        <div class="row justify-content-between">
                            <div class="form-group col-sm-6">
                                <button type="button" id="addNew" class="btn-block btn-info">New Product</button>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="submit" class="btn-block btn-primary" value="Add Products">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>