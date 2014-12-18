<div class="container setting-container">
    <div class="row setting-dashboard">
        <h2 class="setting-container-title">Account Settings</h2>
        <div class="col-lg-3 col-md-3 col-sm-3 setting-dashboard-left">
            <div class="setting-avatar">
                <?php if ($userInfo['us_avatar'] == NULL): ?>
                <img src="<?php echo base_url(); ?>public/img/login-logo.png" width="150" height="150" style="border: 1px solid #e5e5e5;"/>
                <?php else: ?>
                <img src="<?php echo base_url(); ?>public/upload/<?php echo $userInfo['us_avatar']; ?>" width="150" height="150" style="border: 1px solid #e5e5e5;"/>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 setting-dashboard-right">
            <div class="setting-container-title-hidden">
                <h2>Account Settings</h2>
            </div>
            
            <div class="row setting-dashboard-content">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 setting-dashboard-icon">User Name :
                    
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 setting-dashboard-content-input"><?php echo $userInfo['us_username']; ?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 setting-dashboard-link">
                    <a href="<?php echo site_url('account'); ?>">Thay đổi</a>
                </div>
            </div>

            <div class="row setting-dashboard-content">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 setting-dashboard-icon">Email :
                    
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 setting-dashboard-content-input"><?php echo $userInfo['us_email']; ?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 setting-dashboard-link">
                    <a href="<?php echo site_url('account'); ?>">Thay đổi</a>
                </div>
            </div>

            <div class="row setting-dashboard-content">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 setting-dashboard-icon setting-dashboard-link">Mật khẩu :
                   
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 setting-dashboard-content-input">******</div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 setting-dashboard-link">
                    <a href="<?php echo site_url('account/changepass'); ?>">Thay đổi</a>
                </div>
            </div>


            <div class="row setting-dashboard-content">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 setting-dashboard-icon">Payment :
                   
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 setting-dashboard-content-input"><?php echo $userInfo['us_balance']; ?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 setting-dashboard-link">
                    <a href="<?php echo site_url('payment') ?>">Thay đổi</a>
                </div>
            </div>
        </div>
    </div>

</div>