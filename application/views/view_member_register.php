<div class="contact-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form headstyle pt_90">
                    <h4>Member Register</h4>
                    <?php
                    if($this->session->flashdata('error')) {
                        echo '<div class="error-class">'.$this->session->flashdata('error').'</div>';
                    }
                    if($this->session->flashdata('success')) {
                        echo '<div class="success-class">'.$this->session->flashdata('success').'</div>';
                    }
                    ?>
                    <?php echo form_open(base_url().'member/register',array('class' => '')); ?>
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Email address" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" id="password" class="form-control" onkeyup="check();" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" id="confirm_password" class="form-control" onkeyup="check();" placeholder="Confirm Password" required>
                            <span id="message"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn" name="form1">Register</button>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <a href="<?php echo base_url().'member/login' ?>" style="color: red; text-decoration: none;">Already have an account?</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var check = function () {
        if(document.getElementById('password').value == document.getElementById('confirm_password').value) {
            if(document.getElementById('password').value == '' && document.getElementById('password').value == '') {
                document.getElementById('message').style.display = 'none';
            } else {
                document.getElementById('message').style.display = 'block';
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            }
        } else {
            document.getElementById('message').style.display = 'block';
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
        }
    }
</script>