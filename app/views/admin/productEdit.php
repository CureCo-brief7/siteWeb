<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php';
?>
<div class="body">
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Edit Product</h3>
                <div class="card2">
                    <form class="form-card" method="post" action="<?=URLROOT?>Admin/productEdit/<?= $data2['Product'][0]->id_p ?>">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Name<span class="text-danger"> *</span>
                                </label>
                                <input required value="<?= $data2['Product'][0]->Name ?>" type="text" name="Name"
                                    placeholder="Enter Name Of Product" onblur="validate(1)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Prix<span class="text-danger"> *</span>
                                </label>
                                <input required value="<?= $data2['Product'][0]->Price ?>" type="number" name="Prix"
                                    placeholder="Enter Prix Of Product" onblur="validate(2)">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Quantity<span class="text-danger"> *</span>
                                </label>
                                <input required value="<?= $data2['Product'][0]->Quantity ?>" type="number" name="Quantity"
                                    placeholder="Enter Quantity Of Product" onblur="validate(3)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Description<span class="text-danger"> *</span>
                                </label>
                                <textarea required style="resize : none;height: 100px;" type="text" name="Description"
                                    placeholder="Description"
                                    onblur="validate(4)"><?= $data2['Product'][0]->Description ?></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Image<span class="text-danger"> *</span>
                                </label>
                                <input required src="<?= URLROOT?>img/<?= $data2['Product'][0]->Image ?>" type="image" onblur="validate(4)">
                            </div>
                        </div>
                        <div class="row justify-content-between file-upload">
                            <div class="image-upload-wrap">
                                <input required class="file-upload-input required"  name="Image" type='file' onchange="readURL(this);"
                                    accept="image/*" />
                                <div class="drag-text">
                                    <h3>Drag and drop a file or select Image To Edit</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                            class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6">
                                <input required type="submit" class="btn-block btn-primary" value="Edit Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>