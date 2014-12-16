<section id="banner-area" class="forgot-pass">
    <div class="wrapper forgot-pass-wrapper">

        <div class="row-fluid" style="width: 100%;text-align: center;">
            <!-- Download / Sign Up Form -->
            <div class="span4 login">
                <form class="form-area" id="form-area" name="form-area" action="" method="post">
                    <h1>Forgot password</h1>
                    <?php if(!empty($error)): ?>
                    <div class="alert alert-danger login-message-error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if(!empty($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <div class="email-login-icon"><input type="text" placeholder="Enter your Email" name="email" id="email"></div>
                    <input type="submit" value="Send Email" name="send-mail">
                </form>
            </div>
            <!-- End Download / Sign Up Form -->

        </div>

    </div>
</section>
