<?php
$noNavbarMember = '';
$noFooter = '';
include_once APPROOT . '/views/inc/header.inc.php' 
?>
<?=  $_SESSION['user_id'] . $_SESSION['user_name'];?> | member
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>