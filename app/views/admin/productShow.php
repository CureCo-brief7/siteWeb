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
                            <th>Date</th>
                            <th class="">Quantity</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><?=$data2['Product'][0]->id_p?></td>
                            <td><?=$data2['Product'][0]->Name?></td>
                            <td><?=$data2['Product'][0]->Description?></td>
                            <td><?=$data2['Product'][0]->Price?> DH</td>
                            <td><?=$data2['Product'][0]->date?></td>
                            <td class=""><?=$data2['Product'][0]->Quantity?></td>
                            <td class="td-actions ">
                                <a href="<?= URLROOT ?>admin/productEdit/<?= $data2['Product'][0]->id_p ?>">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-success btn-link btn-just-icon btn-sm" data-original-title=""
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="<?= URLROOT ?>admin/productDelete/<?= $data2['Product'][0]->id_p ?>">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-danger btn-link btn-just-icon btn-sm" data-original-title=""
                                        title="Delete">
                                        <i class="material-icons">close</i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>