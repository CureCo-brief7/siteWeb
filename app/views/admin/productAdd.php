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
                    <form class="form-card" method="post" action="<?=URLROOT?>Admin/productAdd">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Name<span class="text-danger"> *</span>
                                </label>
                                <input type="text" name="Name"
                                    placeholder="Enter Name Of Product" onblur="validate(1)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Prix<span class="text-danger"> *</span>
                                </label>
                                <input type="number" name="Prix"
                                    placeholder="Enter Prix Of Product" onblur="validate(2)">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Quantity<span class="text-danger"> *</span>
                                </label>
                                <input type="number" name="Quantity"
                                    placeholder="Enter Quantity Of Product" onblur="validate(3)">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">
                                    Description<span class="text-danger"> *</span>
                                </label>
                                <textarea style="resize : none;height: 100px;" type="text" name="Description"
                                    placeholder="Description"
                                    onblur="validate(4)"></textarea>
                            </div>
                        </div>
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger( 'click' )">Add
                                Image</button>

                            <div class="image-upload-wrap">
                                <input class="file-upload-input"  name="Image" type='file' onchange="readURL(this);"
                                    accept="image/*" />
                                <div class="drag-text">
                                    <h3>Drag and drop a file or select add Image</h3>
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
                                <input type="submit" class="btn-block btn-primary" value="Add Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>