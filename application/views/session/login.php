<section id="banner-area">
    <div class="wrapper login-form">
        <div class="row-fluid" style="width: 100%;text-align: center;">
            <div class="span4 login">
                <form class="form-area form-login" id="form-login" name="form-login" action="" method="post">
                    <h1>LOGIN</h1>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger login-message-error input-update"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="form-group input-update">
                        <div class="input-group">
                            <input type="text" placeholder="Enter username" name="username" id="username">
                            <i class="fa fa-user"></i>
                        </div>
                        <?php if (!empty($data_error['username'])): ?>
                            <label for="username" class="error"><?php echo $data_error['username'] ?></label>
                        <?php endif; ?>
                        <div id="username_validate">
                        </div>
                    </div>

                    <div class="form-group input-update">
                        <div class="input-group">
                            <input type="password" placeholder="Enter your password" name="password" id="password">	
                            <i class="fa fa-lock"></i>
                        </div>
                        <?php if (!empty($data_error['password'])): ?>
                            <label for="password" class="error"><?php echo $data_error['password'] ?></label>
                        <?php endif; ?>
                        <div id="password_validate">
                        </div>
                    </div>
                    <div class="register-submit">
                        <input type="submit" class="btn btn-success" value="LOGIN" name="login">
                    </div>

                    <div class="remember-me input-update group">
                        <div class='pull-left'>
                            <input style="" name="remember" id="remember_me" value="remember" type="checkbox" /><label for="remember">Keep me signed in</label>
                        </div>
                        <div class="pull-right">
                            <a style="margin-top: 5px;" class="float-right forgot-password" href="<?php echo site_url('forgot-password') ?>">Forgot Password?</a>
                        </div>
                    </div>

                        <div class="input-update">
                        Don’t have an account?<span><a class="cya-button" href="<?php echo site_url('register'); ?>"> Register Now</a></span>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>