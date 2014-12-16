<div class="page-header">

    <h1><?php echo $title ?></h1>

</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
            <?php if (!empty($errors)): ?>
                <div class="bg-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="firstname">First name *: </label>
                <div class="col-sm-9">
                    <input type="text" id="firstname" autocomplete="off" value="<?php echo!empty($users['firstname']) ? $users['firstname'] : '' ?>" name="firstname" placeholder="enter first name" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="lastname">Last name *: </label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" autocomplete="off" value="<?php echo!empty($users['lastname']) ? $users['lastname'] : '' ?>" name="lastname" placeholder="enter last name" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="email">Email *: </label>
                <div class="col-sm-9">
                    <input type="text" id="email" autocomplete="off" value="<?php echo!empty($users['email']) ? $users['email'] : '' ?>" name="email" placeholder="enter email" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="password">Password *: </label>
                <div class="col-sm-9">
                    <input type="password" id="password" autocomplete="off" value="<?php echo!empty($users['password']) ? $users['password'] : '' ?>" name="password" placeholder="enter password" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cf_password">Comfirm Password *: </label>
                <div class="col-sm-9">
                    <input type="password" id="cf_password" autocomplete="off" value="<?php echo!empty($users['password']) ? $users['password'] : '' ?>" name="cf_password" placeholder="enter comfirm Password" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="phone">Phone *: </label>
                <div class="col-sm-9">
                    <input type="text" id="phone" autocomplete="off" value="<?php echo!empty($users['phone']) ? $users['phone'] : '' ?>" name="phone" placeholder="enter phone" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="active">Active : </label>
                <div class="col-sm-9">
                    <input type="checkbox" id="active" autocomplete="off" value="1" <?php echo (!isset($users['active']) || $users['active'] == 1) ? 'checked' : '' ?> name="active" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="active">Redirect submit order : </label>
                <div class="col-sm-9">
                    <input type="checkbox" id="redirect_submit_order" autocomplete="off" value="1" <?php echo (!isset($users['redirect_submit_order']) || $users['redirect_submit_order'] == 1) ? 'checked' : '' ?> name="redirect_submit_order" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div><!-- /.col -->
</div><!-- /.row -->
