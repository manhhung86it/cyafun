<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-user-update" class="span8">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register"><img src="<?php echo base_url(); ?>public/img/login-logo.png" alt="" title="" >
                            <?php if ($id == 0) { ?>
                                <span>ADD USER</span>
                            <?php } ?>
                            <?php if ($id != 0) { ?>
                                <span>UPDATE USER</span>
                            <?php } ?>
                        </div>
                        <div class="form-group input-update">
                            <label for="firstname">Firstname:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['firstname']) ? $user['firstname'] : '' ?>" class="form-control input-lg" name="firstname" id="firstname">
                            </div>
                            <?php if (!empty($data_error['firstname'])): ?>
                                <label for="firstname" class="error"><?php echo $data_error['firstname'] ?></label>
                            <?php endif; ?>
                            <div id="firstname_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="lastname">Lastname:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['lastname']) ? $user['lastname'] : '' ?>" class="form-control input-lg" name="lastname" id="lastname">

                            </div>
                            <?php if (!empty($data_error['lastname'])): ?>
                                <label for="lastname" class="error"><?php echo $data_error['lastname'] ?></label>
                            <?php endif; ?>
                            <div id="lastname_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="fax">Email:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="text" value="<?php echo!empty($user['email']) ? $user['email'] : '' ?>" class="form-control input-lg" name="email" id="email">
                            </div>
                            <?php if (!empty($data_error['email'])): ?>
                                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
                            <?php endif; ?>
                            <div id="email_validate">

                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" value="" class="form-control input-lg" name="password" id="password">

                            </div>
                            <?php if (!empty($data_error['password'])): ?>
                                <label for="password" class="error"><?php echo $data_error['password'] ?></label>
                            <?php endif; ?>
                            <div id="password_validate">

                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="cf_password">Comfirm password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" value="" class="form-control input-lg" name="cf_password" id="cf_password">

                            </div>
                            <?php if (!empty($data_error['cf_password'])): ?>
                                <label for="cf_password" class="error"><?php echo $data_error['cf_password'] ?></label>
                            <?php endif; ?>
                            <div id="cf_password_validate">

                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="phone">Phone:</label>
                            <div class="input-group">   
                                <i class="fa fa-mobile"></i><input type="text" value="<?php echo!empty($user['phone']) ? $user['phone'] : '' ?>" class="form-control input-lg" name="phone" id="phone">

                            </div>
                            <?php if (!empty($data_error['phone'])): ?>
                                <label for="phone" class="error"><?php echo $data_error['phone'] ?></label>
                            <?php endif; ?>
                            <div id="phone_validate">

                            </div>
                        </div>
                        <div class="form-group input-radio-update">
                            <label for="active" style="width: 22%;">Active :</label>
                            <div class="input-group">
                                <input type="checkbox" value="1" <?php echo (!isset($user['active']) || $user['active'] == 1) ? 'checked' : '' ?> class="form-control input-lg" name="active" id="active">
                            </div>
                        </div>
                        <div class="form-group input-radio-update">
                            <label for="active">Redirect submit order :</label>
                            <div class="input-group">
                                <input type="checkbox" value="1" <?php echo (isset($user['redirect_submit_order']) && $user['redirect_submit_order'] == 1) ? 'checked' : '' ?> class="form-control input-lg" name="redirect_submit_order" id="redirect_submit_order">
                            </div>
                        </div>
                        <?php if ($id == 0) { ?>
                            <div class="register-submit">
                                <input type="submit"  id="update_supplier" value="ADD" class="btn center-block">
                            </div>
                            <div class="more-order">
                                <a style="cursor: pointer;" onclick="history.back(1);">Back</a>
                            </div>
                        <?php } ?>
                        <?php if ($id != 0) { ?>
                            <div class="register-submit">
                                <input type="submit"  id="update_supplier" value="Update" class="btn center-block">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
            </form>
        </div>
    </div>

</div>
<span id="feature"></span>
</div>
