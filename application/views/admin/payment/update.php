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
                <label class="col-sm-3 control-label no-padding-right" for="name">Name *: </label>
                <div class="col-sm-9">
                    <input type="text" id="name" autocomplete="off" value="<?php echo!empty($payment['payment_name']) ? $payment['payment_name'] : '' ?>" name="name" placeholder="name" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="name">Code *: </label>
                    <div class="col-sm-9">
                        <input type="text" id="name" autocomplete="off" value="<?php echo!empty($payment['payment_code']) ? $payment['payment_code'] : '' ?>" name="code" placeholder="code" class="col-xs-10 col-sm-5" />
                    </div>
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="address1">Rate *: </label>
                <div class="col-sm-9">
                    <input type="text" id="address1" autocomplete="off" value="<?php echo!empty($payment['payment_rate']) ? $payment['payment_rate'] : '' ?>" name="rate" placeholder="enter Rate" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="address2">Currency *: </label>
                <div class="col-sm-9">
                    <input type="text" id="address2" autocomplete="off" value="<?php echo!empty($payment['payment_currency']) ? $payment['payment_currency'] : '' ?>" name="currency" placeholder="enter Currency" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="state">Status *: </label>
                <div class="col-sm-9">
                    <input type="checkbox" value="1" <?php echo (!isset($payment['payment_status']) || $payment['payment_status'] == 1) ? 'checked' : '' ?> name="status" id="status">
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
