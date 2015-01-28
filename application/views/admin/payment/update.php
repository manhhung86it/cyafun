<div class="page-header">

    <h1><?php echo $title ?></h1>

</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-6 tabs-border center-block">
        <div>
            <ul class="tabs">
                <li><a href="#Informations" class="active">Informations</a></li>
                <li><a href="#Options">Options</a></li>
            </ul>                  
        </div>

        <!-- PAGE CONTENT BEGINS -->
        <form id="Informations" class="form-horizontal tab_content" role="form" action="" method="post" autocomplete="off">
            <?php if (!empty($errors)): ?>
                <div class="bg-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="alert alert-block alert-success">
                    <button data-dismiss="alert" class="close" type="button">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <?php echo $success ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="name">Name *: </label>
                <div class="col-sm-9">
                    <input type="text" id="name" autocomplete="off" value="<?php echo!empty($payment['payment_name']) ? $payment['payment_name'] : '' ?>" name="name" placeholder="name" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="name">Code *: </label>
                <div class="col-sm-9">
                    <input type="text" id="name" autocomplete="off" value="<?php echo!empty($payment['payment_code']) ? $payment['payment_code'] : '' ?>" name="code" placeholder="code" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="address1">Rate *: </label>
                <div class="col-sm-9">
                    <input type="text" id="address1" autocomplete="off" value="<?php echo!empty($payment['payment_rate']) ? $payment['payment_rate'] : '' ?>" name="rate" placeholder="enter Rate" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="address2">Currency *: </label>
                <div class="col-sm-9">
                    <input type="text" id="address2" autocomplete="off" value="<?php echo!empty($payment['payment_currency']) ? $payment['payment_currency'] : '' ?>" name="currency" placeholder="enter Currency"/>
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
                <div style="text-align: center;">
                    <input type="submit" value="submit" name="submit_information" class="btn btn-success">
                </div>
            </div>
        </form>

        <form id="Options" class="form-horizontal tab_content" role="form" action="" method="post" autocomplete="off">
            <?php if (!empty($errors)): ?>
                <div class="bg-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php foreach ($paymentOptions as $key => $value) { ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="name"><?php echo $key ?> *: </label>
                    <div class="col-sm-9">
                        <input type="text" id="name" autocomplete="off" value="<?php echo!empty($value) ? $value : '' ?>" name="<?php echo $key ?>" placeholder="<?php echo $key ?>" required=""/>
                    </div>
                </div>
                <div class="space-4"></div>
            <?php } ?>

            <div class="clearfix form-actions">
                <div style="text-align: center;">
                    <input type="submit" value="submit" name="submit_option" class="btn btn-success">
                </div>
            </div>
        </form>



    </div><!-- /.col -->
</div><!-- /.row -->
<script>
    $(document).ready(function() {
        $('.tab_content:not(:first)').hide();
        $('.tabs li a').click(function() {
            $('.tabs li a').removeClass('active');
            $(this).addClass('active');
            $('.tab_content').hide();

            var activeTab = $(this).attr('href');
            //activeTab = #news// activeTab =#random
            $(activeTab).fadeIn();
            return false;
        });

    })
</script>