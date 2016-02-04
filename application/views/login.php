<div class="login_page_logo">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo ASSETS_URI; ?>images/logo.png" alt="" title="" class="img-responsive"></a>
    </div>
    
<!--        <form action="login" method="POST" name="login_form">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" name="user_name" class="form-control" placeholder="username" required >
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="user_pass" id="inputPassword" class="form-control" placeholder="Password" required>
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in" name="login"/>
        </form>-->
        <div class="panel login_panel">
            
            <div class="panel-body">
                <div class="login_lock text-center"><i class="fa fa-lock fa-3x text-center"></i></div>
                <h2 class="text-center">Login</h2>
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
                    <form class="form-signin" method="POST" action="login" role="form">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                        <input required type="text" name="user_name" placeholder="Username" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                        <input required type="password" name="user_pass" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <input type="hidden" value="Sign in" name="login"/>
                                    <button value="Login" class="btn btn-lg login_buton" type="submit">Login <i class="fa fa-sign-in"></i></button>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <!--<p class="text-center for_pass"><a href="http://111.93.163.213/SMGHealthAdmin/php/forgot-password">Forgot Password?</a></p>-->
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>