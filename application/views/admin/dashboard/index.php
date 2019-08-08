<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/js/demo/dashboard.min.js"></script>


<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">&nbsp;</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
                <h4>TOTAL VISITORS</h4>
                <p>3,291,922</p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-comment"></i></div>
            <div class="stats-info">
                <h4>SUBSCRIBER</h4>
                <p>673,204</p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-grey-darker">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>UNIQUE VISITORS</h4>
                <p>1,291,922</p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-black-lighter">
            <div class="stats-icon"><i class="fa fa-clock"></i></div>
            <div class="stats-info">
                <h4>AVG TIME ON SITE</h4>
                <p>00:12:23</p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->
<!-- begin row -->
<div class="row">
    <!-- begin col-8 -->
    <div class="col-lg-8">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm"></div>
            </div>
        </div>
        <!-- end panel -->

        <!-- begin tabs -->
        <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
            <li class="nav-item"><a href="#latest-post" data-toggle="tab" class="nav-link active"><i class="fa fa-camera fa-lg m-r-5"></i> <span class="d-none d-md-inline">Latest Post</span></a></li>
            <li class="nav-item"><a href="#event" data-toggle="tab" class="nav-link"><i class="fa fa-calendar fa-lg m-r-5"></i> <span class="d-none d-md-inline">Event</span></a></li>
        </ul>
        <div class="tab-content" data-sortable-id="index-3">
            <div class="tab-pane fade active show" id="latest-post">
                <div class="height-sm" data-scrollbar="true">
                    <ul class="media-list media-list-with-divider">
                        <?php foreach ($latest_post as $post): ?>
                        <li class="media media-lg">
                            <a href="javascript:;" class="pull-left">
                                <img class="media-object" src="<?php echo base_url(); ?>public/uploads/<?php echo $post->photo; ?>" alt="" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $post->news_title; ?></h4>
                                <?php echo $post->news_content_short; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="event">
                <div class="height-sm" data-scrollbar="true">
                    <ul class="media-list media-list-with-divider">
                        <?php foreach ($latest_event as $event): ?>
                        <li class="media media-sm">
                            <a href="javascript:;" class="pull-left">
                                <img src="<?php echo base_url(); ?>public/uploads/<?php echo $event->photo ?>" alt="" class="media-object rounded-corner" />
                            </a>
                            <div class="media-body">
                                <a href="javascript:;"><h4 class="media-heading"><?php echo $event->event_title ?></h4></a>
                                <p class="m-b-5">
                                    <?php echo $event->event_content_short ?>
                                </p>
                                <i class="text-muted"><?php echo $event->event_start_date ?> until <?php echo $event->event_end_date ?></i>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end tabs -->
    </div>
    <!-- end col-8 -->
    <!-- begin col-4 -->
    <div class="col-lg-4">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="index-7">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Visitors User Agent</h4>
            </div>
            <div class="panel-body">
                <div id="donut-chart" class="height-sm"></div>
            </div>
        </div>
        <!-- end panel -->

        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="index-10">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Calendar</h4>
            </div>
            <div class="panel-body">
                <div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative"><div></div></div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-4 -->
</div>

<script>
    $(document).ready(function() {
        Dashboard.init();
    });
</script>