<div class="" id="tabs-form-payment">
    <div class="tab-menu" id="tab-menu">
        <?php if (isset($mobile) && $mobile): ?>
            <div class="input-update"><input type="radio" name="tab-menu-content" value="#mobile" />mobile</div>
        <?php endif; ?>
        <?php if (isset($pm) && $pm): ?>
            <div class="input-update"><input type="radio" name="tab-menu-content" value="#pm" />pm</div>   
        <?php endif; ?>
    </div>
    <?php if (isset($mobile) && $mobile): ?>
        <form role="form" method="post" action="" id="mobile" class="span8" enctype="multipart/form-data">                     
            <div class="form-group input-update">
                <label for="number">Ma the: * </label> 
                <div class="input-group">
                    <i class="fa fa-database"></i> 
                    <input type="text" value="" name="number" id="number">
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
                    <i class="fa fa-database"></i> <input type="text" value="" name="serial" id="serial">
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
                        <option value="VNP">Vinaphone</option>
                        <option value="VMS">Mobiphone</option>
                        <option value="VTT">Viettel</option>
                        <option value="FPT">FPT</option>
                        <option value="VTC">VTC Vcoin</option>
                        <option value="MGC">Mega Card</option>
                    </select>
                </div>

                <?php if (!empty($data_error['supplier'])): ?>
                    <label for="supplier" class="error"><?php echo $data_error['supplier'] ?></label>
                <?php endif; ?>
                <div id="supplier_validate">
                </div>
            </div>
            <div class="register-submit">
                <input  class="btn btn-success" type="submit" name="submit"  id="submit_payment" value="Nạp thẻ">
            </div>
            <div class="register-submit">
                <a style="cursor: pointer;" onclick="history.back(1);">Cancel</a>
            </div>
        </form>
    <?php endif; ?>
    <?php if (isset($pm) && $pm): ?>
        <form role="form" method="post" action="" id="pm" class="span8" enctype="multipart/form-data">                      
            <div class="form-group input-update">
                <label for="number">coin :</label>
                <div class="input-group">
                    <i class="fa fa-database"></i> <input type="text" value="" name="number" id="number">
                </div>
                <?php if (!empty($data_error['number'])): ?>
                    <label for="number" class="error"><?php echo $data_error['number'] ?></label>
                <?php endif; ?>
                <div id="number_validate">
                </div>
            </div>

            <div class="register-submit">
                <input class="btn btn-success" type="submit" name="pm_submit"  id="submit_payment" value="submit">
            </div>
            <div class="register-submit">
                <a style="cursor: pointer;" onclick="history.back(1);">Cancel</a>
            </div>
        </form>
    <?php endif; ?>

</div>

