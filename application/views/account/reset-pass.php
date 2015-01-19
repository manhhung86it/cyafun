<?php if ($permission_error == true): ?>
    <section id="intro" class="forgot-pass">
        <div class="wrapper forgot-pass-wrapper">	

            <!-- Headline -->
            <div class="headline">
                <h1>Reset password</h1>
                <h2>please check email check to reset password.</h2>
            </div>	
            <!-- End Headline -->


        </div>
    </section>
<?php else: ?>
    <section id="banner-area" class="forgot-pass">
        <div class="wrapper forgot-pass-wrapper">

            <div class="row-fluid" style="text-align: center;">
                <!-- Download / Sign Up Form -->
                <div class="span4 login">
                    <form class="form-area" id="form-reset-password" name="form-reset-password" action="" method="post">
                        <h1>Reset password</h1>
                        <?php if (!empty($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <div class="form-group input-update">
                            <div class="input-group">
                                <input type="password" placeholder="Enter your Password" name="password" id="password" c>
                            </div>
                            <div id="password_validate" class="password_validate">
                                <?php if (!empty($data_error['password'])): ?>
                                    <label for="password" class="error"><?php echo $data_error['password'] ?></label>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <div class="input-group">
                                <input type="password" placeholder="Confirm your Password" name="re_password" id="re_password">
                            </div>
                            <div id="re_password_validate" class="re_password_validate">
                                <?php if (!empty($data_error['re_password'])): ?>
                                    <label for="re_password" class="error"><?php echo $data_error['re_password'] ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="register-submit">
                            <input class="btn btn-success" type="submit" value="Reset Password" name="reset_pass">
                        </div>
                    </form>
                </div>
                <!-- End Download / Sign Up Form -->

            </div>

        </div>
    </section>
<?php endif; ?>
