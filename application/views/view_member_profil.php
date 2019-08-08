<div class="contact-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form headstyle pt_90">
                    <h4><?php echo $this->session->userdata('_member')['name'] ?></h4>
                    <?php
                    if($this->session->flashdata('error')) {
                        echo '<div class="error-class">'.$this->session->flashdata('error').'</div>';
                    }
                    if($this->session->flashdata('success')) {
                        echo '<div class="success-class">'.$this->session->flashdata('success').'</div>';
                    }
                    ?>
                    <?php echo form_open(base_url().'member/profile',array('class' => '')); ?>
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <span>Name</span>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $profile['member_name'] ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Email</span>
                            <input type="text" class="form-control" placeholder="Email address" name="email" value="<?php echo $profile['member_email'] ?>" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Phone</span>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $profile['member_phone'] ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <span>Address</span>
                            <textarea class="form-control" rows="4" name="address"><?php echo $profile['member_address'] ?></textarea>
                        </div>


                        <div class="form-group col-md-6">
                            <button type="submit" class="btn" name="form1">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>