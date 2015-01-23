
<div class="service">
    <!-- Start service -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($info)): ?>
        <div class="alert alert-danger"><?php echo $info; ?></div>
    <?php endif; ?>
    <form role="form" method="post" id='register_form' name="register_form" class="form-area span8">
        <h1>REGISTER</h1>
        <div class="form-group input-update">
            <label class='label-input' for="InputFirstname">Username *:</label>
            <div class="input-group">
                <i class="fa fa-user"></i><input type="text" class="input-register" name="InputUsername" id="InputUsername" placeholder="Enter Username">
            </div>
            <?php if (!empty($data_error['firstname'])): ?>
                <label for="firstname" class="error"><?php echo $data_error['firstname'] ?></label>
            <?php endif; ?>
            <div id="InputUsername_validate">
            </div>
        </div>

        <div class="form-group input-update">
            <label class='label-input' for="InputEmail" required>Email *:</label>
            <div class="input-group">
                <i class="fa fa-envelope-square"></i><input type="email" class="input-register required email" id="InputEmail" name="InputEmail" placeholder="Enter Email" required>
            </div>
            <?php if (!empty($data_error['email'])): ?>
                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
            <?php endif; ?>
            <div id="InputEmail_validate">
            </div>
        </div>


        <div class="form-group input-update">
            <label class='label-input' for="InputLastName">Name Display *:</label>
            <div class="input-group">
                <i class="fa fa-user"></i><input type="text" class="input-register" name="InputDisplayName" id="InputDisplayName" placeholder="Enter Display Name" required>
            </div>
            <?php if (!empty($data_error['lastname'])): ?>
                <label for="lastname" class="error"><?php echo $data_error['lastname'] ?></label>
            <?php endif; ?>
            <div id="InputDisplayName_validate">
            </div>

        </div>

        <div class="form-group input-update">
            <label class='label-input' for="InputPassword">Password *:</label>
            <div class="input-group">
                <i class="fa fa-lock"></i><input type="password" class="input-register required" name="InputPassword" id="InputPassword" placeholder="Enter Password" required>
            </div>
            <?php if (!empty($data_error['password'])): ?>
                <label for="password" class="error"><?php echo $data_error['password'] ?></label>
            <?php endif; ?>
            <div id="InputPassword_validate">
            </div>
        </div>
        <div class="form-group input-update">
            <label class='label-input' for="InputRePassword">Confirm Password *:</label>
            <div class="input-group">
                <i class="fa fa-lock"></i><input type="password" class="input-register required" name="InputRePassword" id="InputRePassword" placeholder="Enter Confirm Password" required>
            </div>
            <?php if (!empty($data_error['re_password'])): ?>
                <label for="repassword" class="error"><?php echo $data_error['repassword'] ?></label>
            <?php endif; ?>
            <div id="InputRePassword_validate">
            </div>
        </div>             
        <div class="input-update">
            <input style="box-shadow: none;" type="checkbox" class="TermOfUse" name="TermOfUse" id="TermOfUse" value="TermOfUse"><span class="term-of-use">I have read and accept the <a href="#" class="term-of-use">terms of use</a></span><br>
            <?php if (!empty($data_error['TermOfUse'])): ?>
                <label for="TermOfUse" class="error TermOfUse-error"><?php echo $data_error['TermOfUse'] ?></label>
            <?php endif; ?>
            <div id="TermOfUse_validate">
            </div>
        </div>
        <div class="register-submit">
            <input type="submit" class="btn btn-success" name="submit" id="submit" value="SUBMIT">
        </div>
    </form>
</div>