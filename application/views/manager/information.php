<div class="service">
    <!-- Start service -->
    <div class="container">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form role="form" method="post" id='update-account-information-form' name="update-account-information-form" class="span8">
            <div class="row">
                <div class="col-lg-6 register-table">
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
                            <div id="firstname_validate">
                            </div>
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
                            <div id="lastname_validate">
                            </div>


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
                            <div id="email_validate">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="phone">Phone *:</label>
                            <div class="input-group">
                                <i class="fa fa-mobile"></i> <input type="text" value="<?php echo $dataPost['phone'] ?>" class="form-control input-register digits required" id="phone" name="phone" placeholder="Enter Phone" required>
                            </div>
                            <?php if (!empty($data_error['phone'])): ?>
                                <label for="phone" class="error"><?php echo $data_error['phone'] ?></label>
                            <?php endif; ?>
                            <div id="phone_validate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 register-table">  
                    <div class="logo-register"><img src="<?php echo base_url(); ?>public/img/register-retaurant.png" alt="" title="" ><span>Restaurant</span></div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="name">Name Of Restaurant *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['name'] ?>" class="form-control input-register" id="name" name="name" placeholder="Enter Name" required> 
                            </div>
                            <?php if (!empty($data_error['name'])): ?>
                                <label for="name" class="error"><?php echo $data_error['name'] ?></label>
                            <?php endif; ?>
                            <div id="name_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="address1">Address1:</label>
                            <div class="input-group">
                                <i class="fa fa-map-marker"></i><input type="text" value="<?php echo $dataPost['address1'] ?>" class="form-control input-register" id="address1" name="address1" placeholder="Enter Address1">                       
                            </div>
                            <?php if (!empty($data_error['address1'])): ?>
                                <label for="address1" class="error"><?php echo $data_error['address1'] ?></label>
                            <?php endif; ?>
                            <div id="address1_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="address2">Address2:</label>
                            <div class="input-group">
                                <i class="fa fa-map-marker"></i><input type="text" value="<?php echo $dataPost['address2'] ?>" class="form-control input-register" id="address2" name="address2" placeholder="Enter Address2">                       
                            </div>
                            <?php if (!empty($data_error['address2'])): ?>
                                <label for="address2" class="error"><?php echo $data_error['address2'] ?></label>
                            <?php endif; ?>
                            <div id="address2_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="suburb">Suburb:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['suburb'] ?>" class="form-control input-register" id="suburb" name="suburb" placeholder="Enter Suburb">                       
                            </div>
                            <?php if (!empty($data_error['suburb'])): ?>
                                <label for="suburb" class="error"><?php echo $data_error['suburb'] ?></label>
                            <?php endif; ?>
                            <div id="suburb_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="postcode">Postcode:</label>
                            <div class="input-group">
                                <i class="fa fa-spinner"></i><input type="text" value="<?php echo $dataPost['postcode'] ?>" class="form-control input-register" id="postcode" name="postcode" placeholder="Enter Postcode">                       
                            </div>
                            <?php if (!empty($data_error['postcode'])): ?>
                                <label for="postcode" class="error"><?php echo $data_error['postcode'] ?></label>
                            <?php endif; ?>
                            <div id="postcode_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="state">State:</label>
                            <div class="input-group">
                                <i class="fa fa-map-marker"></i><select id="Inputstate" name="state" class="suggest-province-code valid">
                                    <option value=""></option>
                                    <?php
                                    foreach ($state_restaurant as $key => $value) {
                                        if (strcasecmp($dataPost['state'], $value) == 0)
                                            echo '<option value="' . $value . '" selected="selected">' . $value . '</option>';
                                        else
                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php if (!empty($data_error['state'])): ?>
                                <label for="state" class="error"><?php echo $data_error['state'] ?></label>
                            <?php endif; ?>
                            <div id="state_validate">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="register-submit">
                    <input type="submit" id="submit" value="Update">
                    <div class="more-order">
                        <a href="<?php echo site_url('account/changepass') ?>" >Change password</a>
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>