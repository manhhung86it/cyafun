
<div class="row">
    <div class="col-xs-12">

        <div id="recent-box" class="widget-box transparent">
            <div class="widget-header">
                <h4 class="widget-title lighter smaller">
                    <i class="ace-icon fa fa-cog orange"></i>Setting
                </h4>
                <?php if(!empty($msg_status) && $msg_status == 'success'): ?>
                <div class="alert alert-block alert-success">
                    <button data-dismiss="alert" class="close" type="button">
                        <i class="ace-icon fa fa-times"></i>
                    </button>

                    <?php echo $msg ?>
                </div>
                <?php endif; ?>
                <div class="widget-toolbar no-border">
                    <ul id="recent-tab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#task-api" data-toggle="api">API</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main padding-4">
                    <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                        <div class="tab-content padding-8">
                            <div class="tab-pane active" id="task-api">
                                <h4 class="smaller lighter green">
                                    <i class="ace-icon fa fa-list"></i>
                                    API
                                </h4>
                                <?php $option_api = !empty($options['api']) ? $options['api'] : array(); ?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="api_env"> Environment </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="api_env" autocomplete="off" value="<?php echo!empty($option_api['env']) ? $option_api['env'] : '' ?>" name="options[api][env]" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>

                                <div class="space-4"></div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="api_usernamne"> Username </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="api_username" autocomplete="off" value="<?php echo!empty($option_api['username']) ? $option_api['username'] : '' ?>" name="options[api][username]" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>

                                <div class="space-4"></div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="api_password"> Password </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="api_password" autocomplete="off" value="<?php echo!empty($option_api['password']) ? $option_api['password'] : '' ?>" name="options[api][password]" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>

                                <div class="space-4"></div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="key_id">Key Id </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="api_key_id" autocomplete="off" value="<?php echo!empty($option_api['key_id']) ? $option_api['key_id'] : '' ?>" name="options[api][key_id]" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>

                                <div class="space-4"></div>
                            </div>
                        </div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-info">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div>

    </div>
</div>

