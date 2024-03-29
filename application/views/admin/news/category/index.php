<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/js/demo/table.js"></script>

<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">News</a></li>
    <li class="breadcrumb-item active">Category</li>
</ol>

<h1 class="page-header">&nbsp;</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Category</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="pull-right">
                <a href="javascript:;" onclick="App.loadIntoBox('<?php echo base_url('admin/category/add') ?>')" class="btn btn-success btn-form"><span class="fa fa-plus-square fa-lg"></span>&nbsp; Add New</a>
            </div>

            <div class="panel-body">
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="1%"></th>
                        <th class="text-nowrap">Category Name</th>
                        <th class="text-nowrap" width="250px">Banner</th>
                        <th class="text-nowrap" width="95px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        DrawTable.ajax("<?php echo base_url() ?>admin/category/ajax_list", "table");
    });

    function redraw() {
        DrawTable.redraw("table");
    }
</script>