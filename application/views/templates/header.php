<nav id="navbar-scroll" class="navbar navbar-inverse navbar-fixed-top" role="navigation">    <div class="container">        <div class="navbar-header">            <button type="button" class="navbar-toggle" id="btn_show_hide_nav">                <span class="sr-only">Toggle navigation</span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>            </button>            <a class="navbar-brand" href="<?php echo site_url(); ?>">Restaurant</a>        </div>        <div class="collapse navbar-collapse navbar-ex1-collapse">            <ul class="nav navbar-nav navbar-right">                                <?php if (empty($auth)): ?>                    <?php if ($controller == "welcome") { ?>                        <li class="active-nav navbar-home"><a href="<?php echo site_url(); ?>">HOME</a></li>                    <?php } else { ?>                        <li class="navbar-home"><a href="<?php echo site_url(); ?>">HOME</a></li>                    <?php } ?>                    <?php if ($controller == "features" && $action == "index") { ?>                        <li class="active-nav navbar-features"><a href="<?php echo site_url('features/index'); ?>">FEATURES</a></li>                    <?php } else { ?>                        <li class="navbar-features"><a href="<?php echo site_url('features/index'); ?>">FEATURES</a></li>                    <?php } ?>                    <?php if ($controller == "features" && $action == "aboutPage") { ?>                        <li class="active-nav navbar-about"><a href="<?php echo site_url('features/aboutPage'); ?>">ABOUT</a></li>                    <?php } else { ?>                        <li class="navbar-about"><a href="<?php echo site_url('features/aboutPage'); ?>">ABOUT</a></li>                    <?php } ?>                    <?php if ($controller == "contact" && $action == "index") { ?>                        <li class="active-nav navbar-contact"><a href="<?php echo site_url('contact/index'); ?>">CONTACT</a></li>                    <?php } else { ?>                        <li class="navbar-contact"><a href="<?php echo site_url('contact/index'); ?>">CONTACT</a></li>                    <?php } ?>                    <li class="navbar-login"><a href="<?php echo site_url('session/login'); ?>">LOGIN</a></li>                <?php else: ?>                    <?php if ($controller == "dashboard") { ?>                        <li class="active-nav navbar-home"><a href="<?php echo site_url('dashboard'); ?>">DASHBOARD</a></li>                    <?php } else { ?>                        <li class="navbar-home"><a href="<?php echo site_url('dashboard'); ?>">DASHBOARD</a></li>                    <?php } ?>                    <?php if ($controller == "account" && $action != "changepass") { ?>                        <li class="active-nav navbar-about"><a href="<?php echo site_url('account'); ?>">ACCOUNT</a></li>                    <?php } else { ?>                        <li class="navbar-about"><a href="<?php echo site_url('account'); ?>">ACCOUNT</a></li>                    <?php } ?>                    <?php if ($controller == "account" && $action == "changepass") { ?>                        <li class="active-nav navbar-about"><a href="<?php echo site_url('account/changepass'); ?>">CHANGE PASSWORD</a></li>                    <?php } else { ?>                        <li class="navbar-about"><a href="<?php echo site_url('account/changepass'); ?>">CHANGE PASSWORD</a></li>                    <?php } ?>                    <li><a href="<?php echo site_url('session/logout'); ?>">LOGOUT</a></li>                <?php endif; ?>            </ul>        </div>    </div></nav><span class="home"></span>