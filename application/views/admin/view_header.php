<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php echo $this->config->item('project') ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="venus cms" name="description" />
    <meta content="bogcamp.com" name="author" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/uploads/<?php echo $setting['favicon']; ?>">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/style.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/css/default/theme/red.css" rel="stylesheet" id="theme" />

    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/admin/2.0/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

    <script src="<?php echo base_url(); ?>public/admin/2.0/plugins/pace/pace.min.js"></script>
</head>
<body>
<div id="page-loader" class="fade show"><span class="spinner"></span></div>

<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
    <div id="header" class="header navbar-default">
        <div class="navbar-header">
            <a href="<?php echo base_url(); ?>admin/main" class="navbar-brand"><span class="navbar-logo"></span> <b><?php echo $this->config->item('project') ?></b> CMS</a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <ul class="navbar-nav navbar-right">
            <li>
                <form class="navbar-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter keyword" />
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if($this->session->userdata('_venus')['photo'] === ''): ?>
                        <img src="<?php echo base_url(); ?>public/img/no-photo.jpg" alt="user photo">
                    <?php else: ?>
                        <img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('_venus')['photo']; ?>" alt="user photo">
                    <?php endif; ?>
                    <span class="d-none d-md-inline"><?php echo $this->session->userdata('_venus')['full_name']; ?></span> <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo base_url(); ?>admin/profile" class="dropdown-item">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo base_url(); ?>admin/login/logout" class="dropdown-item">Log Out</a>
                </div>
            </li>
        </ul>
    </div>

    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <a href="javascript:;" data-toggle="nav-profile">
                        <div class="cover with-shadow"></div>
                        <div class="image">
                            <?php if($this->session->userdata('_venus')['photo'] == ''): ?>
                                <img src="<?php echo base_url(); ?>public/img/no-photo.jpg" alt="user photo">
                            <?php else: ?>
                                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('_venus')['photo']; ?>" alt="user photo">
                            <?php endif; ?>
                        </div>
                        <div class="info">
                            <b class="caret pull-right"></b>
                            <?php echo $this->session->userdata('_venus')['full_name']; ?>
                            <small><?php echo $this->session->userdata('_venus')['email']; ?></small>
                        </div>
                    </a>
                </li>
                <li>
                    <ul class="nav nav-profile">
                        <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                        <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                    </ul>
                </li>
            </ul>

            <?php
                $class_name = '';
                $segment_2 = 0;
                $segment_3 = 0;
                $class_name = $this->router->fetch_class();
                $segment_2 = $this->uri->segment('2');
                $segment_3 = $this->uri->segment('3');
            ?>
            <ul class="nav">
                <li class="nav-header">Navigation</li>
                <li><a href="#dashboard" data-toggle="ajax"><i class="fa fa-th-large"></i> <span>Dashboard</span></a></li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-newspaper"></i>
                        <span>News</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#category" data-toggle="ajax">Category</a></li>
                        <li><a href="#news" data-toggle="ajax">News</a></li>
                        <li><a href="#comment" data-toggle="ajax">Comment</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-file"></i>
                        <span>Page</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#page" data-toggle="ajax">Static</a></li>
                        <li><a href="#custom" data-toggle="ajax">Custom</a></li>
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                Special
                            </a>
                            <ul class="sub-menu">
                                <li><a href="#event">Event</a></li>
                                <li><a href="#testimonial">Testimonial</a></li>
                                <li><a href="#team_member">Team Member</a></li>
                                <li><a href="#pricing_table">Pricing Table</a></li>
                                <li><a href="#client">Client</a></li>
                                <li><a href="#service">Service</a></li>
                                <li><a href="#feature">Feature</a></li>
                                <li><a href="#why_choose">Why Choose Us</a></li>
                                <li><a href="#faq">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-comment"></i>
                        <span>Subscraiber</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#subscriber" data-toggle="ajax">All Subscribers</a></li>
                        <li><a href="#subscriber/send_email" data-toggle="ajax">Email to Subscribers</a></li>
                    </ul>
                </li>
                <li><a href="#photo" data-toggle="ajax"><i class="fa fa-camera"></i> <span>Photo Gallery</span></a></li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-gift"></i>
                        <span>Widget</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#slider" data-toggle="ajax">Slider</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fa fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#setting" data-toggle="ajax">General</a></li>
                        <li><a href="#menu" data-toggle="ajax">Menu</a></li>
                        <li><a href="#social_media" data-toggle="ajax">Social Media</a></li>
                    </ul>
                </li>


                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            </ul>

        </div>
    </div>
    <div class="sidebar-bg"></div>

    <div id="content" class="content"></div>

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
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
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function() {
        App.init({
            ajaxMode: true,
            ajaxDefaultUrl: '#dashboard',
            ajaxType: 'GET',
            ajaxDataType: 'html'
        });
    });
</script>
</body>
</html>
