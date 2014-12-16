<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-productcsv-update" class="span8" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register">
                            <span>Product Csv</span>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Supplier:</label>
                            <div class="input-group">
                                <i class="fa fa-user"></i>  <select name="supplier_id" id="supplier_id">
                                    <?php foreach ($suppliers as $supplier): ?>
                                        <option value="<?php echo $supplier['id']; ?>" <?php echo (!empty($supplier_id) && $supplier['id'] == $supplier_id) ? 'selected' : ''; ?>><?php echo $supplier['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php if (!empty($data_error['supplier_id'])): ?>
                                <label for="supplier_id" class="error"><?php echo $data_error['supplier_id'] ?></label>
                            <?php endif; ?>
                            <div id="supplier_id_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="csv">Csv:</label>
                            <div class="input-group">
                                <i class="fa fa-file-excel-o"></i><input type="file" value="" class="form-control input-lg" name="csv" id="csv">                               
                            </div>
                            <?php if (!empty($data_error['csv'])): ?>
                                <label for="csv" class="error"><?php echo $data_error['csv'] ?></label>
                            <?php endif; ?>
                            <div id="csv_validate">
                            </div>
                        </div>
                        <div class="register-submit">
                            <input type="submit" name="upload_product" id="upload_product" value="Upload" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
