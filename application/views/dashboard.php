<div class="container setting-container" style="min-height: 490px;">
    <div class="order-header">
        <div class="last-order">LAST ORDERS</div>
        <div class="btn-new-order">
            <a class="cya-button" href="<?php echo site_url('order/create'); ?>">NEW ORDER</a>
        </div>
    </div>
    <table id="table-dasboard" class="table table-striped table-bordered" style="text-align: center;">
        <thead class="thead-order">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>$Total</th>
                <th>Date Add</th>
                <th>Date Edit</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="tbody-order">
            <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['id'] ?></td>
                        <td><?php echo $order['name']?></td>
                        <?php if($order_status[$order['status']]=="Completed"){ ?>
                        <td><span class="complate-order"><?php echo $order_status[$order['status']] ?></span><i class="fa fa-check"></i></td>
                        <?php }else{ ?>
                        <td><span class="pending-order"><?php echo $order_status[$order['status']] ?></span></td>
                        <?php } ?>
                        <td>$<?php echo number_format($order['total'], 2) ?></td>
                        <td><?php echo date('d/m/Y', strtotime($order['date_added'])) ?></td>
                        <td><?php echo!empty($order['date_modified']) ? date('d/m/Y', strtotime($order['date_modified'])) : '' ?></td>
                        <td>
                            <a href="<?php echo site_url('order/view_orders/' . $order['id'].'/'.$order['user_id']) ?>" title="View">View</a>
                            <?php if ($auth['parent_id'] == 0): ?>
                                /<a href="<?php echo site_url('order/update_orders/' . $order['id'].'/'.$order['user_id']) ?>" title="Edit">Edit</a>
                            <?php elseif (($order['user_id'] == $auth['id']) && $order['status'] == 1): ?>
                                /<a href="<?php echo site_url('order/update_orders/' . $order['id'].'/'.$order['user_id']) ?>" title="Edit">Edit</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="more-order pull-right"><a href="<?php echo site_url('order/orders')?>" title="Edit">More</a></div>
</div>