<div class="service">
    <!-- Start service -->
        <div class="row">
            <form role="form" method="post" action="" id="form-user-admin-update" class="span8" enctype="multipart/form-data">
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
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['ad_username']) ? $user['ad_username'] : '' ?>" class="form-control input-lg" name="ad_username" id="ad_username">
                            </div>
                            <?php if (!empty($data_error['ad_username'])): ?>
                                <label for="ad_username" class="error"><?php echo $data_error['ad_username'] ?></label>
                            <?php endif; ?>
                            <div id="ad_username_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="ad_fullname">Full Name:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($user['ad_fullname']) ? $user['ad_fullname'] : '' ?>" class="form-control input-lg" name="ad_fullname" id="ad_fullname">

                            </div>
                            <?php if (!empty($data_error['ad_fullname'])): ?>
                                <label for="ad_fullname" class="error"><?php echo $data_error['ad_fullname'] ?></label>
                            <?php endif; ?>
                            <div id="ad_fullname_validate">
                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="ad_email">Email:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="text" value="<?php echo!empty($user['ad_email']) ? $user['ad_email'] : '' ?>" class="form-control input-lg" name="ad_email" id="ad_email">
                            </div>
                            <?php if (!empty($data_error['ad_email'])): ?>
                                <label for="ad_email" class="error"><?php echo $data_error['ad_email'] ?></label>
                            <?php endif; ?>
                            <div id="ad_email_validate">

                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="ad_group">Group:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="text" value="<?php echo!empty($user['ad_group']) ? $user['ad_group'] : '' ?>" class="form-control input-lg" name="ad_group" id="ad_group">
                            </div>
                            <?php if (!empty($data_error['ad_group'])): ?>
                                <label for="ad_group" class="error"><?php echo $data_error['ad_group'] ?></label>
                            <?php endif; ?>
                            <div id="ad_group_validate">

                            </div>
                        </div>

                        <div class="form-group input-update">
                            <label for="ad_password">Password:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="text" value="" class="form-control input-lg" name="ad_password" id="ad_password">

                            </div>
                            <?php if (!empty($data_error['ad_password'])): ?>
                                <label for="ad_password" class="error"><?php echo $data_error['ad_password'] ?></label>
                            <?php endif; ?>
                            <div id="ad_password_validate">

                            </div>
                        </div>

                        <?php if ($id != 0) { ?>
                            <div class="form-group input-update">
                                <label for="ad_date_created">Date Created:</label>
                                <div class="input-group" disabled >   
                                    <i class="fa fa-mobile"></i><input type="text" value="<?php echo!empty($user['ad_date_created']) ? $user['ad_date_created'] : '' ?>" class="form-control input-lg" name="ad_date_created" id="ad_date_created">

                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group input-radio-update">
                            <label for="ad_status" style="width: 22%;">Active :</label>
                            <div class="input-group">
                                <input type="checkbox" value="1" <?php echo (!isset($user['ad_status']) || $user['ad_status'] == 1) ? 'checked' : '' ?> class="form-control input-lg" name="ad_status" id="ad_status">
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
<script>
    $(document).ready(function() {
        $("#form-user-admin-update").validate({
            rules: {
                ad_username: {
                    required: true,
                },
                ad_fullname: {
                    required: true,
                },
                ad_email: {
                    required: true,
                    email: true,
                    maxlength: 78,
                }

            },
            messages: {
                ad_username: {
                    required: 'Please enter your first name',
                },
                ad_fullname: {
                    required: 'Please enter your last name',
                },
                ad_email: {
                    required: "Email invalid",
                    email: "Email invalid",
                    maxlength: "Email invalid",
                }
            },
            errorPlacement: function(error, element) {
                var name = $(element).attr("name");
                error.appendTo($("#" + name + "_validate"));
            }
        });
    });
</script>
