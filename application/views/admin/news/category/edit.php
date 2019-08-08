<div class="panel panel-inverse" data-sortable-id="form-validation-1">
    <div class="panel-heading ui-sortable-handle">
        <div class="panel-heading-btn">
            <a onclick="$.facebox.close();" class="btn btn-xs btn-icon btn-circle btn-danger"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Add Category</h4>
    </div>

    <div class="panel-body">
        <?php echo form_open_multipart(base_url().'admin/category/save',array('onsubmit' => 'App.initForm(event, this, true);', 'id' => 'form-data', 'class' => 'form-horizontal', 'data-parsley-validate' => 'true', 'name' => 'form', 'novalidate' => '')); ?>
            <input type="hidden" name="id" value="<?php echo $category['category_id']; ?>">
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Category Name * :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="category_name" name="category_name" placeholder="e.g. Tech" data-parsley-required="true" value="<?php echo $category['category_name']; ?>">
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="email">Banner :</label>
                <div class="col-md-8 col-sm-8">
                    <div class="custom-file">
                        <input type="file" id="file" name="banner" />
                    </div>
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Meta Title :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="meta_title" name="meta_title" data-parsley-required="false" value="<?php echo $category['meta_title']; ?>">
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="message">Meta Keywords :</label>
                <div class="col-md-8 col-sm-8">
                    <textarea class="form-control" id="meta_keyword" name="meta_keyword" rows="4" data-parsley-range="[0,200]" placeholder="Meta keyword"><?php echo $category['meta_keyword']; ?></textarea>
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="message">Meta Description :</label>
                <div class="col-md-8 col-sm-8">
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="4" data-parsley-range="[0,200]" placeholder="Meta description"><?php echo $category['meta_description']; ?></textarea>
                </div>
            </div>
            <div class="form-group row m-b-0">
                <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                <div class="col-md-8 col-sm-8">
                    <input type="submit" class="btn btn-primary btn-save" value="Submit" />
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script></script>
