<section class="content-header">
    <div class="content-header-left">
        <h1>Add Menu Hyperlink</h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart(base_url().'admin/setting/menu',array('class' => 'form-horizontal', 'id' => 'form-hyperlink')); ?>
            <input type="hidden" name="menu_type" value="URL">
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Menu Name <span>*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="e.g. Home" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Target URL <span>*</span></label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control" id="menu_type_param" name="menu_type_param" placeholder="https://your-site.com" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <button type="button" id="menu-hyperlink" class="btn btn-success pull-left" onclick="addMenuHyperlink(this)">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>