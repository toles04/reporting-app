<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="<?php echo base_url() ?>assets/admin/image/png" sizes="16x16" href="<?php echo base_url() ?>assets/admin/plugins/images/favicon.png">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url() ?>assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url() ?>assets/admin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url() ?>assets/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url() ?>assets/admin/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script>
        function deleteConfirm(deleteUrl)
        {
            if(confirm('Are you sure you want to DELETE this RECORD ?'))
            {
                window.location.replace(deleteUrl);
            }
            else
            {
                return false;
            }
            
            return false
        }
    </script>
</head>
<body lass="fix-header">
	<nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    
                    <a class="logo" href="index.html">
                       <b>
                        <img src="<?php echo base_url() ?>assets/admin/plugins/images/logo.png" alt="home" class="dark-logo" />
                        <img src="<?php echo base_url() ?>assets/admin/plugins/images/logo.png" alt="home" class="light-logo" />
                     </b>
                     <span class="hidden-xs">
                        	<img src="<?php echo base_url() ?>assets/admin/plugins/images/admin-text.png" alt="home" class="dark-logo" />
                        	<img src="<?php echo base_url() ?>assets/admin/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <!-- <img src="<?php //echo base_url() ?>assets/admin/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"> --><b class="hidden-xs"><?php echo ucfirst($user->first_name);?> <?php echo ucfirst($user->last_name);?></b></a>
                    </li>
                    <li>
                        <a class="profile-pic" href="<?php echo base_url().'auth/logout'; ?>"> <span class="fa fa-power-off"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
