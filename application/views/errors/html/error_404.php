<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php echo $heading; ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="venus cms" name="description" />
    <meta content="bogcamp.com" name="author" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/theme/red.css" rel="stylesheet" id="theme" />
</head>
<body>
<div id="page-loader" class="fade show"><span class="spinner"></span></div>

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin error -->
    <div class="error">
        <div class="error-code">404</div>
        <div class="error-content">
            <div class="error-message">We couldn't find it...</div>
            <div class="error-desc mb-3 mb-sm-4 mb-md-5">
                The page you're looking for doesn't exist. <br />
                Perhaps, there pages will help find what you're looking for.
            </div>
            <div>
                <a href="<?php echo site_url()?>" class="btn btn-success p-l-20 p-r-20">Go Home</a>
            </div>
        </div>
    </div>
    <!-- end error -->

<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
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
<script src="<?php echo base_url(); ?>public/admin/2.0/js/apps.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>
