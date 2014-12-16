<div class="service">
    <!-- Start service -->
    <div class="container">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form role="form" method="post" id='update-restaurant-form' name="update-restaurant-form" class="span8">
            <div class="row">
                <div class="col-lg-6 center-block register-table" style="float: none;">
                    <div class="logo-register"><img src="<?php echo base_url(); ?>public/img/login-logo.png" alt="" title="" ><span>Personal</span></div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="firstname">FirstName *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['firstname'] ?>" class="form-control input-lg input-register" name="firstname" id="firstname" placeholder="Enter First Name">
                            </div>
                            <?php if (!empty($data_error['firstname'])): ?>
                                <label for="firstname" class="error"><?php echo $data_error['firstname'] ?></label>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="lastname">Last Name *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['lastname'] ?>" class="form-control input-register" name="lastname" id="lastname" placeholder="Enter Last Name" required>
                            </div>
                            <?php if (!empty($data_error['lastname'])): ?>
                                <label for="lastname" class="error"><?php echo $data_error['lastname'] ?></label>
                            <?php endif; ?>


                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="email" required>Email *:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="email" value="<?php echo $dataPost['email'] ?>"  class="form-control input-register required email" id="email" name="email" placeholder="Enter Email" >
                            </div>
                            <?php if (!empty($data_error['email'])): ?>
                                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
<!--                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="password">Password *:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" class="form-control input-register" name="password" id="password" placeholder="Enter Password" >
                            </div>
                            <?php if (!empty($data_error['password'])): ?>
                                <label for="password" class="error"><?php echo $data_error['password'] ?></label>
                            <?php endif; ?>
                        </div>
                    </div>-->
<!--                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="re_password">Confirm Password *:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" autocomplete="off" class="form-control input-register" name="re_password" id="re_password" placeholder="Enter Confirm Password" >
                            </div>
                            <?php if (!empty($data_error['re_password'])): ?>
                                <label for="re_password" autocomplete="off" class="error"><?php echo $data_error['re_password'] ?></label>
                            <?php endif; ?>
                        </div>
                    </div>-->

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="phone">Phone *:</label>
                            <div class="input-group">
                                <i class="fa fa-mobile"></i> <input type="text" value="<?php echo $dataPost['phone'] ?>" class="form-control input-register digits required" id="phone" name="phone" placeholder="Enter Phone" required>
                            </div>
                            <?php if (!empty($data_error['phone'])): ?>
                                <label for="phone" class="error"><?php echo $data_error['phone'] ?></label>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="register-submit">
                    <input type="submit" id="submit" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>