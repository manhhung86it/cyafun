<div id="sidebar" class="sidebar responsive">    <script type="text/javascript">        try {            ace.settings.check('sidebar', 'fixed')        } catch (e) {        }    </script>    <ul class="nav nav-list">        <li class="<?php echo ($action == 'index') ? 'active' : '' ?>">            <a href="<?php echo site_url('admin'); ?>">                <i class="menu-icon fa fa-tachometer"></i>                <span class="menu-text"> Dashboard </span>            </a>            <b class="arrow"></b>        </li>        <!--                <li class="<?php echo ($action == 'setting') ? 'active' : '' ?>">                            <a href="<?php echo site_url('admin/setting'); ?>">                                <i class="menu-icon ace-icon fa fa-cog"></i>                                <span class="menu-text"> Setting </span>                            </a>                                            <b class="arrow"></b>                        </li>-->        <li class="<?php echo (in_array($controller, array('email'))) ? 'active' : '' ?>">            <a href="#" class="dropdown-toggle">                <i class="menu-icon ace-icon fa fa-clipboard"></i>                <span class="menu-text"> Email template </span>                <b class="arrow fa fa-angle-down"></b>            </a>            <b class="arrow"></b>            <ul class="submenu">                <li class="">                    <a href="<?php echo site_url('admin/email') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Manager                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/email/update') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Create                    </a>                </li>            </ul>        </li>         <li class="<?php echo (in_array($controller, array('user'))) ? 'active' : '' ?>">            <a href="#" class="dropdown-toggle">                <i class="menu-icon ace-icon fa fa-clipboard"></i>                <span class="menu-text"> Edit User </span>                <b class="arrow fa fa-angle-down"></b>            </a>            <b class="arrow"></b>            <ul class="submenu">                <li class="">                    <a href="<?php echo site_url('admin/user/users') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Edit User                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/user/update_user') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Add User                    </a>                </li>            </ul>        </li>         <li class="<?php echo (in_array($controller, array('user_admin'))) ? 'active' : '' ?>">            <a href="#" class="dropdown-toggle">                <i class="menu-icon ace-icon fa fa-clipboard"></i>                <span class="menu-text"> Edit admin </span>                <b class="arrow fa fa-angle-down"></b>            </a>            <b class="arrow"></b>            <ul class="submenu">                <li class="">                    <a href="<?php echo site_url('admin/user_admin/users') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Edit Admin                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/user_admin/update_user') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Add new                    </a>                </li>            </ul>        </li>        <li class="<?php echo (in_array($controller, array('frontent'))) ? 'active' : '' ?>">            <a href="#" class="dropdown-toggle">                <i class="menu-icon ace-icon fa fa-clipboard"></i>                <span class="menu-text"> Edit front-end </span>                <b class="arrow fa fa-angle-down"></b>            </a>            <b class="arrow"></b>            <ul class="submenu">                <li class="">                    <a href="<?php echo site_url('admin/frontend/editMenuTop') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        menu top                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/frontend/editMenuSecond') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        menu second                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/frontend/editRecommendGame') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        RECOMMENDED GAMES                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/frontend/editGameFocus') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        Game focus                    </a>                </li>                <li class="">                    <a href="<?php echo site_url('admin/frontend/editNews') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        News                    </a>                </li>            </ul>        </li>        <li class="<?php echo (in_array($controller, array('payment'))) ? 'active' : '' ?>">            <a href="#" class="dropdown-toggle">                <i class="menu-icon ace-icon fa fa-clipboard"></i>                <span class="menu-text"> Edit Payment</span>                <b class="arrow fa fa-angle-down"></b>            </a>            <b class="arrow"></b>            <ul class="submenu">                <li class="">                    <a href="<?php echo site_url('admin/payment') ?>">                        <i class="menu-icon fa fa-caret-right"></i>                        list Payment                    </a>                </li>            </ul>        </li>     </ul><!-- /.nav-list -->    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>    </div>    <script type="text/javascript">        try {            ace.settings.check('sidebar', 'collapsed')        } catch (e) {        }    </script></div>