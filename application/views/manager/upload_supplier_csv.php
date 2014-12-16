<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <form role="form" method="post" action="" id="form-suppliercsv-update" class="span8" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">
                        <div class="logo-register">
                            <span>Supplier Csv</span>
                        </div>

                        <div class="form-group input-update">
                            <label for="csv">Csv:</label>
                            <div class="input-group input-update">
                                <i class="fa fa-file-excel-o"></i><input type="file" value="" class="form-control input-lg" name="csv" id="csv">
                            </div>
                            <?php if (!empty($data_error['csv'])): ?>
                                <label for="csv" class="error"><?php echo $data_error['csv'] ?></label>
                            <?php endif; ?>
                        </div>
                        <div class="register-submit">
                            <input type="submit" name="upload_supplier" id="upload_supplier" value="Upload" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
