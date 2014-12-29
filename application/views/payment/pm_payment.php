<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row" id="tabs-form-payment">
            <form role="form" method="post" action="<?php echo $link_submit; ?>" id="pm_payment_step2" class="span8" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <div class="table-update center-block span6">                        
                        <div class="form-group input-update">
                            <label for="number">Ma the: * </label>
                            <div class="input-group">
                                <i class="fa fa-database"></i> <input type="text" value="<?php echo!empty($data['coin_amount']) ? $data['coin_amount'] : '' ?>" class="form-control input-lg" name="number" id="number">
                            </div>

                            <?php if (!empty($data_error['number'])): ?>
                                <label for="number" class="error"><?php echo $data_error['number'] ?></label>
                            <?php endif; ?>
                            <div id="number_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="serial">Serial: </label>
                            <div class="input-group">
                                <i class="fa fa-database"></i> <input type="text" value="" class="form-control input-lg" name="serial" id="serial">
                            </div>

                            <?php if (!empty($data_error['serial'])): ?>
                                <label for="serial" class="error"><?php echo $data_error['serial'] ?></label>
                            <?php endif; ?>
                            <div id="serial_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="supplier">Nha cung cap: </label>
                            <div class="input-group">
                                <i class="fa fa-database"></i> <select name="supplier" id="supplier">
                                    <option>Vinaphone</option>
                                    <option>Mobiphone</option>
                                    <option>Viettel</option>
                                    <option>FPT</option>
                                    <option>VTC Vcoin</option>
                                    <option>Mega Card</option>
                                </select>
                            </div>

                            <?php if (!empty($data_error['supplier'])): ?>
                                <label for="supplier" class="error"><?php echo $data_error['supplier'] ?></label>
                            <?php endif; ?>
                            <div id="supplier_validate">
                            </div>
                        </div>
                        <div class="register-submit">
                            <input class="update" type="submit" name="submit"  id="submit_payment" value="Nạp thẻ" class="btn btn-info">
                        </div>
                        <div class="more-order">
                            <a style="cursor: pointer;" onclick="history.back(1);">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>