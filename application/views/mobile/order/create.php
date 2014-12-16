<!-- Intro -->

<div class="container setting-container">
    <h2 style="color : #000;">New Order</h2>
    <div class="data-filter-mobile">
        <div class="form-group input-order-checkbox-mobile">
            <div class="sub-data-filter-mobile">
            <label for="name">Supliers:</label>
            <div class="input-group">
                <select name="suplier-multiple-select[]" id="suplier-multiple-select" multiple="multiple" data-native-menu="false">
                    <?php foreach ($suppliers as $supplier): ?>
                        <option value="<?php echo $supplier['id'] ?>"><?php echo $supplier['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            </div>
        </div>

        <div class="form-group input-order-checkbox-mobile">
            <div class="sub-data-filter-mobile">
            <label for="name">Locations:</label>
            <div class="input-group">
                <select name="location-multiple-select[]" id="location-multiple-select" multiple="multiple" data-native-menu="false">
                    <?php foreach ($locations as $location): ?>
                        <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            </div>
        </div>

        <div class="form-group input-order-checkbox-mobile">
            <div class="sub-data-filter-mobile">
            <label for="name">Categories:</label>
            <div class="input-group">
                <select name="categories-multiple-select[]" id="categories-multiple-select" multiple="multiple" data-native-menu="false">
                    <?php foreach ($productTypes as $productType): ?>
                        <option value="<?php echo $productType['id'] ?>"><?php echo $productType['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            </div>
        </div>
    </div>
    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <div>
        <table id="list-product-order-create-mobile" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>
    </div>
</div>
<!-- End Intro -->