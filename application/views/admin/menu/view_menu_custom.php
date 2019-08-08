<section class="content-header">
    <div class="content-header-left">
        <h1>Add Menu Custom Page</h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart(base_url().'admin/setting/menu',array('class' => 'form-horizontal')); ?>
            <input type="hidden" name="menu_type" value="CST">
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Menu Name <span>*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="menu_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Target Page <span>*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="menu_type_param">
                                <option value="home">Home</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                            <button type="button" class="btn btn-success pull-left" name="form1">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>