<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/headerAdmin.inc.php';
?>
<div class="container" style="margin-top: 50px;">
    <div class="row">

        <div class=" col-md-10 ml-auto mr-auto">
            <div class="table-responsive">
                <table class="table text-left">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th class="">Role</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data2['users'] as $user) : 
                            if ($user->Role == 1) {
                                $Role = 'Admin';
                            } elseif ($user->Role == 0){
                                $Role = 'Member';
                            }?>
                        <tr>
                            <td class="text-center"><?=$user->id_u?></td>
                            <td><?=$user->userName?></td>
                            <td><?=$user->Email?></td>
                            <td class=""><?=$Role?></td>
                            <td class="td-actions">
                                <a href="<?= URLROOT ?>admin/userProduct/<?= $user->id_u ?>">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-info btn-link btn-just-icon btn-sm" data-original-title=""
                                        title="View">
                                        <i class="material-icons">person</i>
                                    </button>
                                </a>
                                <a href="<?= URLROOT ?>admin/userEdit/<?= $user->id_u ?>">
                                    <button type="button" rel="tooltip"
                                        class="btn btn-success btn-link btn-just-icon btn-sm" data-original-title=""
                                        title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="<?= URLROOT ?>admin/userDelete/<?= $user->id_u ?>">
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