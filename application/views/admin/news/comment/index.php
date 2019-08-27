<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/KeyTable/css/keyTable.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/RowReorder/css/rowReorder.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Select/css/select.bootstrap.min.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/DataTables/extensions/Select/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/js/demo/table.js"></script>

<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">News</a></li>
    <li class="breadcrumb-item active">Facebook Comment Setup</li>
</ol>

<h1 class="page-header">&nbsp;</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">Facebook Comment Setup</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->

            <div class="panel-body">
                <p style="padding-bottom: 20px;">Go to the facebook developer section (<a href="https://developers.facebook.com/docs/plugins/comments/">https://developers.facebook.com/docs/plugins/comments/</a>) to get your comment codes.</p>
                <?php echo form_open_multipart(base_url().'admin/comment/save',array('onsubmit' => 'App.initForm(event, this, \'\');', 'id' => 'form-data', 'class' => 'form-horizontal', 'data-parsley-validate' => 'true', 'name' => 'form', 'novalidate' => '')); ?>
                <div class="form-group row m-b-15">
                    <label class="col-md-3 col-sm-3 col-form-label" for="fullname">Code to use after the opening &lt;body&gt; tag :</label>
                    <div class="col-md-9 col-sm-9">
                        <textarea class="form-control" name="code_body" style="height:300px;"><?php echo $comment->code_body ?></textarea>
                    </div>
                </div>
                <div class="form-group row m-b-0">
                    <label class="col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-md-9 col-sm-9">
                        <input type="submit" class="btn btn-primary btn-save" value="Update" />
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //
    });
</script>