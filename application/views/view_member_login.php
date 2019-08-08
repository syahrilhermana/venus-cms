<div class="contact-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form headstyle pt_90">
                    <h4>Member Login</h4>
                    <?php
                    if($this->session->flashdata('error')) {
                        echo '<div class="error-class">'.$this->session->flashdata('error').'</div>';
                    }
                    if($this->session->flashdata('success')) {
                        echo '<div class="success-class">'.$this->session->flashdata('success').'</div>';
                    }
                    ?>
                    <?php echo form_open(base_url().'member/login',array('class' => '')); ?>
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Email address" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn" name="form1">Login</button>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <a href="<?php echo base_url().'member/forget-password' ?>" style="color: red; text-decoration: none;">Forget Password?</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>