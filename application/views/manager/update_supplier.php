<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-supplier" class="span8">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register"><img src="<?php echo base_url(); ?>public/img/login-logo.png" alt="" title="" >
                            <?php if ($id == 0) { ?>
                                <span>ADD SUPPLIER</span>
                            <?php } ?>
                            <?php if ($id != 0) { ?>
                                <span>UPDATE SUPPLIER</span>
                            <?php } ?>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Supplier name:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i><input type="text" value="<?php echo!empty($supplier['name']) ? $supplier['name'] : '' ?>" class="form-control input-lg supplier" name="name" id="name">
                            </div>
                            <?php if (!empty($data_error['name'])): ?>
                                <label for="name" class="error"><?php echo $data_error['name'] ?></label>
                            <?php endif; ?>
                            <div id="name_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="phone">Phone:</label>
                            <div class="input-group">
                                <i class="fa fa-mobile"></i> <input type="text" value="<?php echo!empty($supplier['phone']) ? $supplier['phone'] : '' ?>" class="form-control input-lg" name="phone" id="phone">
                            </div>
                            <?php if (!empty($data_error['phone'])): ?>
                                <label for="phone" class="error"><?php echo $data_error['phone'] ?></label>
                            <?php endif; ?>
                            <div id="phone_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="fax">Fax:</label>
                            <div class="input-group">
                                <i class="fa fa-fax"></i><input type="text" value="<?php echo!empty($supplier['fax']) ? $supplier['fax'] : '' ?>" class="form-control input-lg" name="fax" id="fax">

                            </div>
                            <?php if (!empty($data_error['fax'])): ?>
                                <label for="fax" class="error"><?php echo $data_error['fax'] ?></label>
                            <?php endif; ?>
                            <div id="fax_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="fax">Email:</label>
                            <div class="input-group">
                                <i class="fa fa-envelope-square"></i><input type="text" value="<?php echo!empty($supplier['email']) ? $supplier['email'] : '' ?>" class="form-control input-lg" name="email" id="email">
                            </div>
                            <?php if (!empty($data_error['email'])): ?>
                                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
                            <?php endif; ?>
                            <div id="email_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="fax">Submission method :</label>
                            <div class="input-group">
                                <i class="fa fa-hand-o-down"></i><select name="order_submission_method">
                                    <option value="0" <?php echo empty($supplier['order_submission_method']) ? 'selected' : '' ?>>Email</option>
                                    <option value="1" <?php echo!empty($supplier['order_submission_method']) ? 'selected' : '' ?>>Fax</option>
                                </select>
                            </div>
                        </div>
                        <?php if ($id == 0) { ?>
                            <div class="register-submit">
                                <input type="submit"  id="update_supplier" value="ADD" class="btn center-block">
                            </div>
                            <div class="more-order">
                                <a style="cursor: pointer;" onclick="history.back(1);">Back</a>
                            </div>
                        <?php } ?>
                        <?php if ($id != 0) { ?>
                            <div class="register-submit">
                                <input type="submit"  id="update_supplier" value="Update" class="btn center-block">
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
