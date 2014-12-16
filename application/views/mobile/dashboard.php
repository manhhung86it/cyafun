<div class="slide-order">
    <div class="banner-button dashboard-btn">
        <a href="#">NEW ORDER</a>
    </div>
</div>
<div class="last-order-mobile">LAST ORDERS</div>
<div class="dashboard-content-mobile">
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <div class="main-content-mobile">
                <div class="content-head-mobile">Order <?php echo $order['id'] ?></div>
                <div class="container dashboard-container-mobile">
                    <div class="content-name-mobile">ID:</div>
                    <div class="content-value-mobile"><?php echo $order['id'] ?></div>

                    <div class="content-name-mobile">NAME:</div>
                    <div class="content-value-mobile"><?php echo $order['firstname'] . ' ' . $order['lastname'] ?></div>

                    <div class="content-name-mobile">$TOTAL:</div>
                    <div class="content-value-mobile"><?php echo number_format($order['total'], 2) ?></div>

                    <div class="content-name-mobile">DATE ADD:</div>
                    <div class="content-value-mobile"><?php echo date('d/m/Y', strtotime($order['date_added'])) ?></div>

                    <div class="content-name-mobile">DATE EDIT:</div>
                    <div class="content-value-mobile"><?php echo!empty($order['date_modified']) ? date('d/m/Y', strtotime($order['date_modified'])) : '' ?></div>
                </div>
                <div class="banner-button btn-view-dashboard-mobile">
                    <a href="<?php echo site_url('order/view/' . $order['id']) ?>" title="View">View</a>
                    <?php if ($auth['parent_id'] == 0): ?>
                        <a href="<?php echo site_url('order/edit/' . $order['id']) ?>" title="Edit">Edit</a>
                    <?php elseif (($order['user_id'] == $auth['id']) && $order['status'] == 1): ?>
                        <a href="<?php echo site_url('order/edit/' . $order['id']) ?>" title="Edit">Edit</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="banner-button btn-viewmore-mobile">
        <a href="#">LOAD MORE</a>
    </div>

</div>