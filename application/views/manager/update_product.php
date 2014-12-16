<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-product-update" class="span8" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register">
                            <?php if ($id == 0) { ?>
                                <span>ADD PRODUCT</span>
                            <?php } ?>
                            <?php if ($id != 0) { ?>
                                <span>UPDATE PRODUCT</span>
                            <?php } ?>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Product name:</label>
                            <div class="input-group">
                                <i class="fa fa-database"></i> <input type="text" value="<?php echo!empty($product['name']) ? $product['name'] : '' ?>" class="form-control input-lg" name="name" id="name">
                            </div>

                            <?php if (!empty($data_error['name'])): ?>
                                <label for="name" class="error"><?php echo $data_error['name'] ?></label>
                            <?php endif; ?>
                            <div id="name_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Supplier:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i> <select name="supplier_id" id="supplier_id">
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?php echo $supplier['id']; ?>" <?php echo (!empty($product['supplier_id']) && $supplier['id'] == $product['supplier_id']) ? 'selected' : ''; ?>><?php echo $supplier['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <?php if (!empty($data_error['supplier_id'])): ?>
                                <label for="supplier_id" class="error"><?php echo $data_error['supplier_id'] ?></label>
                            <?php endif; ?>
                            <div id="supplier_id_validate">
                            </div>
                        </div>
                        <div class="form-group input-update-checkbox">
                            <label for="name">Product location:</label>
                            <div class="input-group">
                                <?php foreach ($locations as $location): ?>
                                    <input type="checkbox" id="product_location[]" name="product_location[]" <?php echo (!empty($product['product_location']) && in_array($location['id'], $product['product_location'])) ? 'checked' : '' ?> value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?>
                                <?php endforeach; ?>

                            </div>
                            <?php if (!empty($data_error['product_location'])): ?>
                                <label for="product_location" class="error"><?php echo $data_error['product_location'] ?></label>
                            <?php endif; ?>
                            <div id="product_location_validate">
                            </div>
                        </div>
                        <div class="form-group input-update-checkbox">
                            <label for="name">Categories:</label>
                            <div class="input-group">
                                <?php foreach ($productTypes as $productType): ?>
                                    <input type="checkbox" id="product_type[]" name="product_type[]" <?php echo (!empty($product['product_type']) && in_array($productType['id'], $product['product_type'])) ? 'checked' : '' ?> value="<?php echo $productType['id']; ?>"><?php echo $productType['name']; ?>
                                <?php endforeach; ?>

                            </div>
                            <?php if (!empty($data_error['product_type'])): ?>
                                <label for="product_type" class="error"><?php echo $data_error['product_type'] ?></label>
                            <?php endif; ?>
                            <div id="product_type_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="image">Image:</label>
                            <div class="input-group">
                                <i class="fa fa-picture-o"></i> <input type="file" value="" class="form-control input-lg" name="image" id="image">
                            </div>

                            <?php if (!empty($data_error['image'])): ?>
                                <label for="image" class="error"><?php echo $data_error['image'] ?></label>
                            <?php endif; ?>
                            <?php if (!empty($product['image'])): ?>
                                <img src="<?php echo base_url() . 'public/upload/' . $product['image'] ?>" width="200" height="200">
                            <?php endif; ?>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Unit:</label>
                            <div class="input-group">
                                <i class="fa fa-cubes"></i><input type="text" value="<?php echo!empty($product['unit']) ? $product['unit'] : '' ?>" class="form-control input-lg" name="unit" id="unit">

                            </div>
                            <?php if (!empty($data_error['unit'])): ?>
                                <label for="unit" class="error"><?php echo $data_error['unit'] ?></label>
                            <?php endif; ?>
                            <div id="unit_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Cost:</label>
                            <div class="input-group">
                                <i class="fa fa-usd"></i><input type="text" value="<?php echo!empty($product['cost']) ? $product['cost'] : '' ?>" class="form-control input-lg" name="cost" id="cost">

                            </div>
                            <?php if (!empty($data_error['cost'])): ?>
                                <label for="cost" class="error"><?php echo $data_error['cost'] ?></label>
                            <?php endif; ?>
                            <div id="cost_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="qty">Qty:</label>
                            <div class="input-group">
                                <i class="fa fa-plus-circle"></i><input type="text" value="<?php echo!empty($product['qty']) ? $product['qty'] : '' ?>" class="form-control input-lg" name="qty" id="qty">

                            </div>
                            <?php if (!empty($data_error['qty'])): ?>
                                <label for="qty" class="error"><?php echo $data_error['qty'] ?></label>
                            <?php endif; ?>
                            <div id="qty_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="status">Status:</label>
                            <div class="input-group">
                                <i class="fa fa-filter"></i><select name="status" id="status">
                                    <option value="0" <?php echo (isset($product['status']) && $product['status'] == 0) ? 'selected' : ''; ?>>Deactive</option>
                                    <option value="1" <?php echo (!isset($product['status']) || $product['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                </select>
                            </div>
                        </div>
                        <?php if ($id == 0) { ?>
                            <div class="register-submit">
                                <input class="update" type="submit" name="upload_product"  id="update_product" value="ADD" class="btn btn-info">
                            </div>
                            <div class="more-order">
                                <a style="cursor: pointer;" onclick="history.back(1);">Back</a>
                            </div>
                        <?php } ?>
                        <?php if ($id != 0) { ?>
                            <div class="register-submit">
                                <input type="submit" name="upload_product"  id="update_product" value="Update" class="btn btn-info">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
