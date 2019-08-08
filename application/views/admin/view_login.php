<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php echo $this->config->item('project') ?> | Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url(); ?>public/admin/2.0/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
<div id="page-loader" class="fade show"><span class="spinner"></span></div>

<div id="page-container" class="fade">
    <div class="login login-with-news-feed">
        <div class="news-feed">
            <div class="news-image" style="background-image: url(<?php echo base_url(); ?>public/admin/2.0/img/login-bg/login-bg-11.jpg)"></div>
            <div class="news-caption">
                <h4 class="caption-title"><b><?php echo $this->config->item('project') ?></b> Admin Panel</h4>
                <p>
                    Venus Project for Content Management System
                </p>
            </div>
        </div>

        <div class="right-content">
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b><?php echo $this->config->item('project') ?></b> Admin
                    <small>Content Management System</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>

            <div class="login-content">
                <?php
                if($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('error').'</div>';
                }
                if($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('success').'</div>';
                }
                ?>
                <?php echo form_open(base_url().'admin',array('class' => 'margin-bottom-0', 'autocomplete' => 'off')); ?>
                    <div class="form-group m-b-15">
                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Address" required />
                    </div>
                    <div class="form-group m-b-15">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required />
                    </div>
                    <div class="checkbox checkbox-css m-b-30">
                        <input type="checkbox" id="remember_me_checkbox" value="" />
                        <label for="remember_me_checkbox">
                            Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg" name="form1">Sign me in</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        <a href="<?php echo base_url(); ?>admin/forget-password" class="text-success">Forget Password?</a>
                    </div>
                    <hr />
                    <p class="text-center text-grey-darker">
                        &copy; Venus All Right Reserved 2019
                    </p>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>public/admin/2.0/crossbrowserjs/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/2.0/crossbrowserjs/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/2.0/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/js/theme/default.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/js/apps.js"></script>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>
