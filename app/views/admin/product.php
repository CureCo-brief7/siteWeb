<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php'
    ?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class=" col-md-10 ml-auto mr-auto">
            <div class="table-responsive">
                <span class="span2">
                    <a href="<?=URLROOT?>admin/productAdd"></a>
                </span>
                <table class="table text-left">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data2['products'] as $Product): ?>
                            <tr>
                                <td class="text-center"><?= $Product->id_p ?></td>
                                <td>
                                    <?= $Product->Name ?>
                                </td>
                                <td><?= $Product->Description ?></td>
                                <td>
                                    <?= $Product->Price ?> DH
                                </td>
                                <td>
                                    <?= $Product->Quantity ?>
                                </td>
                                <td class="td-actions">
                                    <a href="<?= URLROOT ?>admin/ProductEdit/<?= $Product->id_p ?>">
                                        <button type="button" rel="tooltip"
                                            class="btn btn-success btn-link btn-just-icon btn-sm" data-original-title=""
                                            title="Edit">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    <a href="<?= URLROOT ?>admin/ProductDelete/<?= $Product->id_p ?>">
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