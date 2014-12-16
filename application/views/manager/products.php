<div class="service">
    <!-- Start service -->
    <div class="container users_manage">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Manage Products</h3>
                <div class="table-header">
                </div>

                <!-- <div class="table-responsive"> -->

                <!-- <div class="dataTables_borderWrap"> -->
                <div>
                    <table id="product_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class=""></th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Cost</th>
                                <th>Date Added</th>
                                <th>Date Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>