<div class="service">
    <!-- Start service -->
    <div class="container">
        <?php if (!empty($updatepass)): ?>
            <div class="alert alert-success"><?php echo $updatepass; ?></div>
        <?php endif; ?>
        <div class="row">
            <form role="form" method="post" action="" id="form-update-password" class="span8">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register">
                            <span>CHANGE PASSWORD</span>
                        </div>
                        <div class="form-group input-update">
                            <label for="oldpass">Current Password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password"  class="form-control input-lg" name="oldpass" id="oldpass">

                            </div>
                            <?php if (!empty($data_error['oldpass'])): ?>
                                <label for="oldpass" class="error"><?php echo $data_error['oldpass'] ?></label>
                            <?php endif; ?>
                            <div id="oldpass_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="newpass">New Password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" value="<?php echo !empty($post['newpass'])?$post['newpass']:'' ?>" class="form-control input-lg" name="newpass" id="newpass">

                            </div>
                            <?php if (!empty($data_error['newpass'])): ?>
                                <label for="newpass" class="error"><?php echo $data_error['newpass'] ?></label>
                            <?php endif; ?>
                            <div id="newpass_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="cf_newpass">Confirm New Password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" class="form-control input-lg" name="cf_newpass" value="<?php echo !empty($post['cf_newpass'])?$post['cf_newpass']:'' ?>"  id="cf_newpass">

                            </div>
                            <?php if (!empty($data_error['cf_newpass'])): ?>
                                <label for="cf_newpass" class="error"><?php echo $data_error['cf_newpass'] ?></label>
                            <?php endif; ?>
                            <div id="cf_newpass_validate">
                            </div>
                        </div>
                        <div class="register-submit">
                            <input type="submit"  id="update_pass" value="Change" class="btn center-block">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
