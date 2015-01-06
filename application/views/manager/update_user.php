<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-user-update" class="span8" enctype="multipart/form-data">
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
                            <label for="name">Name:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['us_username']) ? $user['us_username'] : '' ?>" class="form-control input-lg" name="us_username" id="us_username">
                            </div>
                            <?php if (!empty($data_error['us_username'])): ?>
                                <label for="us_username" class="error"><?php echo $data_error['us_username'] ?></label>
                            <?php endif; ?>
                            <div id="us_username_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="us_avatar">Avatar:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="file" value="" class="form-control input-lg" name="us_avatar" id="us_avatar">
                            </div>
                            <?php if (!empty($user['us_avatar'])): ?>
                                <img src="<?php echo base_url() . 'public/upload/' . $user['us_avatar'] ?>" width="200" height="200">
                            <?php else: ?>
                                <img src="<?php echo base_url() . 'public/img/login-logo.png' ?>" width="200" height="200">
                            <?php endif; ?>
                            <?php if (!empty($data_error['us_avatar'])): ?>
                                <label for="us_avatar" class="error"><?php echo $data_error['us_avatar'] ?></label>
                            <?php endif; ?>
                            <div id="us_avatar_validate">

                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="us_name_display">Name Display:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['us_name_display']) ? $user['us_name_display'] : '' ?>" class="form-control input-lg" name="us_name_display" id="us_name_display">

                            </div>
                            <?php if (!empty($data_error['us_name_display'])): ?>
                                <label for="us_name_display" class="error"><?php echo $data_error['us_name_display'] ?></label>
                            <?php endif; ?>
                            <div id="us_name_display_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="us_fullname">Full Name:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['us_fullname']) ? $user['us_fullname'] : '' ?>" class="form-control input-lg" name="us_fullname" id="us_fullname">

                            </div>
                            <?php if (!empty($data_error['us_fullname'])): ?>
                                <label for="us_fullname" class="error"><?php echo $data_error['us_fullname'] ?></label>
                            <?php endif; ?>
                            <div id="us_fullname_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="us_email">Email:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="text" value="<?php echo!empty($user['us_email']) ? $user['us_email'] : '' ?>" class="form-control input-lg" name="us_email" id="us_email">
                            </div>
                            <?php if (!empty($data_error['us_email'])): ?>
                                <label for="us_email" class="error"><?php echo $data_error['us_email'] ?></label>
                            <?php endif; ?>
                            <div id="us_email_validate">

                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="us_balance">Balance:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="text" value="<?php echo!empty($user['us_balance']) ? $user['us_balance'] : '' ?>" class="form-control input-lg" name="us_balance" id="us_balance">
                            </div>
                            <?php if (!empty($data_error['us_balance'])): ?>
                                <label for="us_balance" class="error"><?php echo $data_error['us_balance'] ?></label>
                            <?php endif; ?>
                            <div id="us_balance_validate">

                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="us_password">Password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="text" value="" class="form-control input-lg" name="us_password" id="us_password">

                            </div>
                            <?php if (!empty($data_error['us_password'])): ?>
                                <label for="us_password" class="error"><?php echo $data_error['us_password'] ?></label>
                            <?php endif; ?>
                            <div id="us_password_validate">

                            </div>
                        </div>

                        <?php if ($id != 0) { ?>
                            <div class="form-group input-update">
                                <label for="us_date_created">Date Created:</label>
                                <div class="input-group" disabled >   
                                    <i class="fa fa-mobile"></i><input type="text" value="<?php echo!empty($user['us_date_created']) ? $user['us_date_created'] : '' ?>" class="form-control input-lg" name="phone" id="phone">

                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group input-radio-update">
                            <label for="us_status" style="width: 22%;">Active :</label>
                            <div class="input-group">
                                <input type="checkbox" value="1" <?php echo (!isset($user['us_status']) || $user['us_status'] == 1) ? 'checked' : '' ?> class="form-control input-lg" name="us_status" id="us_status">
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
