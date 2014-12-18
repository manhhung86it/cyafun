<div class="service">
    <!-- Start service -->
    <div class="container">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form role="form" method="post" id='update-user-cyafun-form' name="update-user-cyafun-form" class="span8" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 center-block register-table" style="float: none;">
                    <div class="logo-register"><span>Personal</span></div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="image">Image:</label>
                            <div class="input-group">
                                <i class="fa fa-picture-o"></i> <input type="file" value="" class="form-control input-lg input-register" name="image" id="image" style="width: 87%;">
                            </div>

                            <?php if (!empty($data_error['image'])): ?>
                                <label for="image" class="error"><?php echo $data_error['image'] ?></label>
                            <?php endif; ?>
                            <?php if (!empty($dataPost['us_avatar'])): ?>
                                <img src="<?php echo base_url() . 'public/upload/' . $dataPost['us_avatar'] ?>" width="200" height="200">
                            <?php else: ?>
                                <img src="<?php echo base_url() . 'public/img/login-logo.png' ?>" width="200" height="200">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="username">User Name *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['us_username'] ?>" class="form-control input-lg input-register" name="username" id="username" placeholder="Enter User Name" disabled>
                            </div>
                            <?php if (!empty($data_error['username'])): ?>
                                <label for="username" class="error"><?php echo $data_error['username'] ?></label>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="nameDisplay">Name Display *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['us_name_display'] ?>" class="form-control input-register" name="nameDisplay" id="nameDisplay" placeholder="Enter Name Display" required>
                            </div>
                            <?php if (!empty($data_error['nameDisplay'])): ?>
                                <label for="nameDisplay" class="error"><?php echo $data_error['nameDisplay'] ?></label>
                            <?php endif; ?>


                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="email" required>Email *:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="email" value="<?php echo $dataPost['us_email'] ?>"  class="form-control input-register required email" id="email" name="email" placeholder="Enter Email" >
                            </div>
                            <?php if (!empty($data_error['email'])): ?>
                                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
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