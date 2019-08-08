<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Custom Page</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/custom" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php
			if($this->session->flashdata('error')) {
				?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
				<?php
			}
			if($this->session->flashdata('success')) {
				?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
				<?php
			}
			?>

			<?php echo form_open_multipart(base_url().'admin/custom/edit/'.$page['custom_page_id'],array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Page Title <span>*</span></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" onkeyup="slug(this)" onblur="slug(this)" name="custom_page_title" value="<?php echo $page['custom_page_title']; ?>">
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Slug <span>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" id="slug-text" class="form-control" name="custom_page_slug" value="<?php echo $page['custom_page_slug'] ?>">
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Page Content <span>*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="custom_page_content"><?php echo $page['custom_page_content']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Page Publish Date <span>*</span></label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="custom_page_date" id="datepicker" value="<?php echo $page['custom_page_date']; ?>">(Format: yy-mm-dd)
							</div>
						</div>
				        <h3 class="seo-info">Photo and Banner</h3>
				        <div class="form-group">
				            <label for="" class="col-sm-2 control-label">Existing Featured Photo</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				            	<?php
				            	if($page['photo'] == '') {
				            		echo 'No photo found';
				            	} else {
				            		?><img src="<?php echo base_url(); ?>public/uploads/<?php echo $page['photo']; ?>" alt="<?php echo $page['custom_page_title']; ?>" class="existing-photo" style="width:140px;"><?php
				            	}
				            	?>
				            </div>
				        </div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Change Featured Photo</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				                <input type="file" name="photo">
				            </div>
				        </div>
				        <div class="form-group">
				            <label for="" class="col-sm-2 control-label">Existing Banner</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				            	<?php
				            	if($page['banner'] == '') {
				            		echo 'No photo found';
				            	} else {
				            		?><img src="<?php echo base_url(); ?>public/uploads/<?php echo $page['banner']; ?>" alt="<?php echo $page['custom_page_title']; ?>" class="existing-photo" style="width:300px;"><?php
				            	}
				            	?>
				            </div>
				        </div>
						<div class="form-group">
				            <label for="" class="col-sm-2 control-label">Change Banner</label>
				            <div class="col-sm-6" style="padding-top:6px;">
				                <input type="file" name="banner">
				            </div>
				        </div>
						<h3 class="seo-info">SEO Information</h3>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Title </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="meta_title" value="<?php echo $page['meta_title']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Keywords </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="meta_keyword" value="<?php echo $page['meta_keyword']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" style="height:200px;"><?php echo $page['meta_description']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</section>

<script type="text/javascript">
    function slug(obj) {
        var text = $(obj).val().toLowerCase().replace(/([^0-9^A-z])/gi, '-');
        $('#slug-text').val(text);
    }
</script>