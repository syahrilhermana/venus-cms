<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/admin/2.0/js/demo/form.js"></script>

<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">News</a></li>
    <li class="breadcrumb-item active">Add</li>
</ol>

<h1 class="page-header">&nbsp;</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
                <h4 class="panel-title">New News</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->

            <div class="panel-body">
                <?php echo form_open_multipart(base_url().'admin/news/save',array('onsubmit' => 'App.initForm(event, this, \'\');', 'id' => 'form-data', 'class' => 'form-horizontal', 'data-parsley-validate' => 'true', 'name' => 'form', 'novalidate' => '')); ?>
                <ul class="nav nav-tabs">
                    <li class="nav-items">
                        <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                            <span class="d-sm-none">Content</span>
                            <span class="d-sm-block d-none">News Content</span>
                        </a>
                    </li>
                    <li class="nav-items">
                        <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                            <span class="d-sm-none">Image</span>
                            <span class="d-sm-block d-none">Photo and Banner</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                            <span class="d-sm-none">SEO</span>
                            <span class="d-sm-block d-none">SEO Information</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade active show" id="default-tab-1">
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">News Title <span>*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" onkeyup="App.initSlug(this, 'news_slug')" onblur="App.initSlug(this, 'news_slug')" name="news_title" required>
                            </div>
                        </div>

                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">Slug <span>*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="news_slug" class="form-control" name="news_slug" required>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">News Short Content <span>*</span></label>
                            <div class="col-md-8 col-sm-8">
                                <textarea class="form-control" name="news_content_short" style="height:80px;" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">News Content <span>*</span></label>
                            <div class="col-md-8 col-sm-8">
                                <textarea class="ckeditor" name="news_content" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">Page Publish Date <span>*</span></label>
                            <div class="col-md-3 col-sm-3">
                                <div class="input-group date" id="news_date">
                                    <input type="text" class="form-control" name="news_date" required />
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">Category <span>*</span></label>
                            <div class="col-md-3 col-sm-3">
                                <select class="form-control simple-select2 col-md-12" name="category_id" required>
                                    <option value="">Select a category</option>
                                    <?php
                                    $i=0;
                                    foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end tab-pane -->
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade" id="default-tab-2">
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">Featured Photo</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label">Banner</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" class="form-control" name="banner">
                            </div>
                        </div>
                    </div>
                    <!-- end tab-pane -->
                    <!-- begin tab-pane -->
                    <div class="tab-pane fade" id="default-tab-3">
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Meta Title</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="news_title">
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Meta Keywords</label>
                            <div class="col-md-8 col-sm-8">
                                <textarea class="form-control" name="news_content_short" style="height:80px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Meta Description</label>
                            <div class="col-md-8 col-sm-8">
                                <textarea class="form-control" name="news_content_short" style="height:80px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end tab-pane -->
                </div>

                <div class="form-group row m-b-0">
                    <label class="col-md-2 col-sm-2 col-form-label">&nbsp;</label>
                    <div class="col-md-9 col-sm-9">
                        <input type="submit" class="btn btn-primary btn-save" value="Submit" />
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        App.initSelect2('Choose Category');
        App.initDatePicker('news_date');
    });
</script>