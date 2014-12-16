<section id="banner-area">
    <div class="login-logo">
        <img src="<?php echo base_url(); ?>public/img/login-logo.png" alt="" title="" height="150" width="150">
    </div>
    <div class="wrapper login-form">

        <div class="row-fluid" style="width: 100%;text-align: center;">
            <div class="span4 login">
                <form class="form-area" id="form-area" name="form-area" action="" method="post">
                    <h1>Dashboard Login</h1>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger login-message-error"><?php echo $error; ?></div>
                    <?php endif; ?>
                        
                    <div class="email-login-icon">
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Enter username" name="username" id="username">
                    </div>
                        
                    <div class="icon-pass-login">
                        <i class="fa fa-lock"></i>
                        <input type="password" placeholder="Enter your password" name="password" id="password">	
                    </div>
                        
                    <div class="remember-me">
                        <input style="width: 5%;" name="remember" id="remember_me" value="remember" type="checkbox" /><label for="remember">Remember Me</label>
                    </div>
                        
                    <a style="margin-top: 5px;" class="float-right forgot-password" href="<?php echo site_url('forgot-password') ?>">Forgot Password?</a>
                    <input type="submit" value="LOGIN" name="login">
                    <div class="login-or">OR</div>
                    <div>
                        <a class="cya-button" href="<?php echo site_url('register'); ?>">SIGN UP</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>