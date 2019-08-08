<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Member</h1>
	</div>
	<div class="content-header-right">
		&nbsp;
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

			<div class="box box-info">

				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Name</th>
								<th>Photo</th>
								<th>Email</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($members as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['member_name']; ?></td>
									<td>
										<img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['member_photo']; ?>" alt="<?php echo $row['member_name']; ?>" style="width:100px;">
									</td>
									<td>
                                        <?php echo $row['member_email']; ?>
									</td>
                                    <td>
                                        <?php echo statusTypeText($row['member_status']); ?>
                                    </td>
									<td>										
										<a href="<?php echo base_url(); ?>admin/member/suspend/<?php echo $row['member_id']; ?>" class="btn btn-warning btn-xs" onClick="return confirm('Are you sure?');">Suspend</a>
										<a href="<?php echo base_url(); ?>admin/member/banned/<?php echo $row['member_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Banned</a>
									</td>
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>