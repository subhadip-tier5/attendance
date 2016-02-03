<div class="container">
    <div class="login_page_logo">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo ASSETS_URI; ?>images/logo.png" alt="" title="" class="img-responsive"></a>
    </div>
    <div class="form-signin">
        <?php 
            if($this->session->has_userdata('suc_msg')){
                echo message_alert($this->session->userdata('suc_msg'), 2);
                $this->session->unset_userdata('suc_msg');
            }
            if($this->session->has_userdata('err_msg')){
                echo message_alert($this->session->userdata('err_msg'), 4);
                $this->session->unset_userdata('err_msg');
            }
        ?>
        <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
        <?php echo validation_errors(); ?>
        <form action="login" method="POST" name="login_form">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" name="user_name" class="form-control" placeholder="username" required >
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="user_pass" id="inputPassword" class="form-control" placeholder="Password" required>
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in" name="login"/>
        </form>
    </div>
</div>