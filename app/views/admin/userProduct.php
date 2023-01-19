<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php'
    ?>
<div class="container" style="margin-top: 50px;">
    <div class="row">

        <div class=" col-md-10 ml-auto mr-auto">
        <h3><small>Product For User</small></h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data2['Products'] as $product) : ?>
                        <tr>
                            <td class="text-center"><?=$product->id_p?></td>
                            <td><?=$product->Name?></td>
                            <td><?=$product->Description?></td>
                            <td><?=$product->Price?></td>
                            <td class="text-right"><?=$product->Quantity?></td>
                            <td class="td-actions text-right">
                                <a href="<?= URLROOT ?>admin/productEdit/<?= $product->id_p ?>">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-success btn-link btn-just-icon btn-sm" data-original-title=""
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="<?= URLROOT ?>admin/productDelete/<?= $product->id_p ?>">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-danger btn-link btn-just-icon btn-sm" data-original-title=""
                                        title="Delete">
                                        <i class="material-icons">close</i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>