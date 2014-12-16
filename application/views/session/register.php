
<div class="service">
    <!-- Start service -->
    <div class="container">
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($info)): ?>
            <div class="alert alert-danger"><?php echo $info; ?></div>
        <?php endif; ?>
        <form role="form" method="post" id='register_form' name="register_form" class="span8">
            <div class="row">
                <div class="col-lg-6 register-table">
                    <div class="logo-register"><img src="<?php echo base_url(); ?>public/img/login-logo.png" alt="" title="" ><span>Personal</span></div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="InputFirstname">FirstName *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" class="form-control input-lg input-register" name="InputFirstname" id="InputFirstname" placeholder="Enter First Name">
                            </div>
                            <?php if (!empty($data_error['firstname'])): ?>
                                <label for="firstname" class="error"><?php echo $data_error['firstname'] ?></label>
                            <?php endif; ?>
                            <div id="InputFirstname_validate">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="InputLastName">Last Name *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" class="form-control input-register" name="InputLastName" id="InputLastName" placeholder="Enter Last Name" required>
                            </div>
                            <?php if (!empty($data_error['lastname'])): ?>
                                <label for="lastname" class="error"><?php echo $data_error['lastname'] ?></label>
                            <?php endif; ?>
                            <div id="InputLastName_validate">
                            </div>

                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="InputEmail" required>Email *:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="email" class="form-control input-register required email" id="InputEmail" name="InputEmail" placeholder="Enter Email" required>
                            </div>
                            <?php if (!empty($data_error['email'])): ?>
                                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
                            <?php endif; ?>
                            <div id="InputEmail_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="InputPassword">Password *:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" class="form-control input-register required" name="InputPassword" id="InputPassword" placeholder="Enter Password" required>
                            </div>
                            <?php if (!empty($data_error['password'])): ?>
                                <label for="password" class="error"><?php echo $data_error['password'] ?></label>
                            <?php endif; ?>
                            <div id="InputPassword_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="InputRePassword">Confirm Password *:</label>
                            <div class="input-group">
                                <i class="fa fa-lock"></i><input type="password" class="form-control input-register required" name="InputRePassword" id="InputRePassword" placeholder="Enter Confirm Password" required>
                            </div>
                            <?php if (!empty($data_error['re_password'])): ?>
                                <label for="repassword" class="error"><?php echo $data_error['repassword'] ?></label>
                            <?php endif; ?>
                            <div id="InputRePassword_validate">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="InputPhone">Phone *:</label>
                            <div class="input-group">
                                <i class="fa fa-mobile"></i> <input type="text" class="form-control input-register digits required" id="InputPhone" name="InputPhone" placeholder="Enter Phone" required>
                            </div>
                            <?php if (!empty($data_error['phone'])): ?>
                                <label for="phone" class="error"><?php echo $data_error['phone'] ?></label>
                            <?php endif; ?>
                            <div id="InputPhone_validate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 register-table">  
                    <div class="logo-register"><img src="<?php echo base_url(); ?>public/img/register-retaurant.png" alt="" title="" ><span>Restaurant</span></div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="Inputownername">Name Of Restaurant *:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" class="form-control input-register" id="Inputownername" name="Inputownername" placeholder="Enter Name" required> 
                            </div>
                            <?php if (!empty($data_error['nameRes'])): ?>
                                <label for="nameRes" class="error"><?php echo $data_error['nameRes'] ?></label>
                            <?php endif; ?>
                            <div id="Inputownername_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="Inputaddress1">Address1:</label>
                            <div class="input-group">
                                <i class="fa fa-map-marker"></i><input type="text" class="form-control input-register" id="Inputaddress1" name="Inputaddress1" placeholder="Enter Address1">                       
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="Inputaddress2">Address2:</label>
                            <div class="input-group">
                                <i class="fa fa-map-marker"></i><input type="text" class="form-control input-register" id="Inputaddress2" name="Inputaddress2" placeholder="Enter Address2">                       
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="Inputsuburb">suburb:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" class="form-control input-register" id="Inputsuburb" name="Inputsuburb" placeholder="Enter Suburb">                       
                            </div>
                            <?php if (!empty($data_error['suburb'])): ?>
                                <label for="suburb" class="error"><?php echo $data_error['suburb'] ?></label>
                            <?php endif; ?>
                            <div id="Inputsuburb_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="Inputpostcode">Postcode:</label>
                            <div class="input-group">
                                <i class="fa fa-spinner"></i><input type="text" class="form-control input-register" id="Inputpostcode" name="Inputpostcode" placeholder="Enter Postcode">                       
                            </div>
                            <?php if (!empty($data_error['postcode'])): ?>
                                <label for="postcode" class="error"><?php echo $data_error['postcode'] ?></label>
                            <?php endif; ?>
                            <div id="Inputpostcode_validate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-register">
                        <div class="register-input">
                            <label for="Inputstate">State:</label>
                            <div class="input-group">
                                <i class="fa fa-map-marker"></i><select id="Inputstate" name="Inputstate" class="suggest-province-code valid">
                                    <option value=""></option>
                                    <option value="NSW" selected="selected">NSW</option>
                                    <option value="VIC">VIC</option>
                                    <option value="WA">WA</option>
                                    <option value="NT">NT</option>
                                    <option value="SA">SA</option>
                                    <option value="TAS">TAS</option>
                                    <option value="ACT">ACT</option>
                                    <option value="QLD">QLD</option>
                                </select>
<!--                                <i class="fa fa-map-marker"></i><input type="text" class="form-control input-register" id="Inputstate" name="Inputstate" placeholder="Enter State">                       -->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="register-submit">
                    <input style="box-shadow: none;" type="checkbox" class="TermOfUse" name="TermOfUse" id="TermOfUse" value="TermOfUse"><span class="term-of-use">I have read and accept the <a href="#" class="term-of-use">terms of use</a></span><br>
                    <?php if (!empty($data_error['TermOfUse'])): ?>
                        <label for="TermOfUse" class="error TermOfUse-error"><?php echo $data_error['TermOfUse'] ?></label>
                    <?php endif; ?>
                    <div id="TermOfUse_validate">
                    </div>
                    <input type="submit" name="submit" id="submit" value="SUBMIT">
                </div>
            </div>
        </form>
    </div>
</div>