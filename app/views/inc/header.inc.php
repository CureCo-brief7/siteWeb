<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT ?>css/style.css">
    <link rel="stylesheet" href="<?= URLROOT ?>css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo APPNAME;?></title>
</head>
<body>
<?php if (!isset($noNavbarAdmin)) include 'navbarAdmin.inc.php' ?>
<?php if (!isset($noNavbarMember)) include 'navbarMember.inc.php' ?>