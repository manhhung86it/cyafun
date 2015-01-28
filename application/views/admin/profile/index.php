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

                        <li><?php echo $errors ?></li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="bg-success">
                    <ul>                        
                        <li><?php echo $success ?></li>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="ad_fullname">Fullname *: </label>
                <div class="col-sm-9">
                    <input type="text" id="name" autocomplete="off" value="<?php echo!empty($admin['ad_fullname']) ? $admin['ad_fullname'] : '' ?>" name="ad_fullname" placeholder="enter fullname" required="required" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>            

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="ad_email">Email *: </label>
                <div class="col-sm-9">
                    <input type="text" id="uname" readonly="true" autocomplete="off" value="<?php echo!empty($admin['ad_email']) ? $admin['ad_email'] : '' ?>" name="ad_email" placeholder="enter email" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="pass">Password: </label>
                <div class="col-sm-9">
                    <input type="password" id="pass" autocomplete="off" value="" name="pass" placeholder="enter password if want change" class="col-xs-10 col-sm-5" />
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
