<div class="container setting-container">
    <h2>SETTINGS</h2>
    <div class="row setting-dashboard">
<!--        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon"><i class="fa fa-user"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link"><a href="<?php echo site_url('manager/information'); ?>">My Acount</a></div>
        </div>-->
        <a href="<?php echo site_url('account/changepass'); ?>">
        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon setting-dashboard-link"><i class="fa fa-lock"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link">Change Password</div>
        </div>
        </a>
        
        <a href="<?php echo site_url('manager/users'); ?>">
        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon"><i class="fa fa-user"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link">Manage Users</div>
        </div>
        </a>
        
        <a href="<?php echo site_url('manager/supplier') ?>">
        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon"><i class="fa fa-user"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link">Manage Suppliers</div>
        </div>
        </a>
        
        <a href="<?php echo site_url('manager/product_types') ?>">
        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon"><i class="fa fa-folder-open-o"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link">Manage Categories</div>
        </div>
        </a>
        
        <a href="<?php echo site_url('manager/locations') ?>">
        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon"><i class="fa fa-map-marker"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link">Manage Locations</div>
        </div>
        </a>
        
        <a href="<?php echo site_url('manager/products') ?>">
        <div class="setting-dashboard-content">
            <div class="col-lg-1 col-md-1 col-sm-1 .col-xs-1 setting-dashboard-icon"><i class="fa fa-file-text-o"></i></div>
            <div class="col-lg-11 col-md-11 col-sm-11 .col-xs-11 setting-dashboard-link">Manage Products</div>
        </div>
        </a>
    </div>
    
</div>