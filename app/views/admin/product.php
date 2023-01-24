<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php'
    ?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class=" col-md-10 ml-auto mr-auto">
            <div class="table-responsive">
                <div class="addSear">
                    <span class="span2">
                        <a href="<?= URLROOT ?>admin/productAdd"></a>
                    </span>
                    <div class="bodyRech">
                        <form action="<?= URLROOT ?>admin/product" method="post" class="search-bar">
                            <input class="inputRech" type="search" name="search" pattern=".*\S.*" required>
                            <button class="search-btn btnRech" type="submit">
                                <span class="spanRech">Search</span>
                            </button>
                        </form>
                    </div>
                </div>
                <table class="table text-left">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>
                                <div>Price</div>
                                <div style="display: flex;gap: 4px;align-items: baseline;">
                                    <span class="Decore">[</span> 
                                    <span class="BY">
                                        <a href="<?= URLROOT ?>Admin/orderProduct/PRICE/ASC">ASC</a>
                                    </span> 
                                    <span class="Decore">|</span> 
                                    <span class="BY">
                                        <a href="<?= URLROOT ?>Admin/orderProduct/PRICE/DESC">DESC</a>
                                    </span> 
                                    <span class="Decore">]</span>
                                </div>
                            </th>
                            <th>
                                <div>Quantity</div>
                                <div style="display: flex;gap: 4px;align-items: baseline;">
                                    <span class="Decore">[</span> 
                                    <span class="BY">
                                        <a href="<?= URLROOT ?>Admin/orderProduct/QUANTITY/ASC">ASC</a>
                                    </span> 
                                    <span class="Decore">|</span> 
                                    <span class="BY">
                                        <a href="<?= URLROOT ?>Admin/orderProduct/QUANTITY/DESC">DESC</a>
                                    </span> 
                                    <span class="Decore">]</span>
                                </div>
                            </th>
                            <th>
                                <div>Date</div>
                                <div style="display: flex;gap: 4px;align-items: baseline;">
                                    <span class="Decore">[</span> 
                                    <span class="BY">
                                        <a href="<?= URLROOT ?>Admin/orderProduct/DATE/ASC">ASC</a>
                                    </span> 
                                    <span class="Decore">|</span> 
                                    <span class="BY">
                                        <a href="<?= URLROOT ?>Admin/orderProduct/DATE/DESC">DESC</a>
                                    </span> 
                                    <span class="Decore">]</span>
                                </div>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data2['products'] as $Product): ?>
                            <tr>
                                <td class="text-center">
                                    <?= $Product->id_p ?>
                                </td>
                                <td>
                                    <?= $Product->Name ?>
                                </td>
                                <td>
                                    <?= $Product->Description ?>
                                </td>
                                <td>
                                    <?= $Product->Price ?> DH
                                </td>
                                <td>
                                    <?= $Product->Quantity ?>
                                </td>
                                <td>
                                    <?= $Product->date ?>
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