<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-producttype-update" class="span8">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register">
                            <?php if ($id == 0) { ?>
                                <span>ADD PRODUCT TYPE</span>
                            <?php } ?>
                            <?php if ($id != 0) { ?>
                                <span>UPDATE PRODUCT TYPE</span>
                            <?php } ?>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Category name:</label>
                            <div class="input-group">
                                <input type="text" value="<?php echo!empty($product_type['name']) ? $product_type['name'] : '' ?>" class="form-control input-lg" name="name" id="name">
                            </div>
                            <?php if (!empty($data_error['name'])): ?>
                                <label for="name" class="error"><?php echo $data_error['name'] ?></label>
                            <?php endif; ?>
                            <div id="name_validate">
                            </div>
                        </div>
                        <?php if ($id == 0) { ?>
                            <div class="register-submit">
                                <input type="submit"  id="update_product_type" value="ADD" class="btn center-block">
                            </div>
                            <div class="more-order">
                                <a style="cursor: pointer;" onclick="history.back(1);">Back</a>
                            </div>
                        <?php } ?>
                        <?php if ($id != 0) { ?>
                            <div class="register-submit">
                                <input type="submit"  id="update_product_type" value="Update" class="btn center-block">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
