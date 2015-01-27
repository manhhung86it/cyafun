<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Payment</h3>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-block alert-success">
                        <button data-dismiss="alert" class="close" type="button">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <div class="table-header">
                    Results for "Payment"
                </div>
                <div>
                    <table id="restaurant_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Payment code</th>
                                <th>payment_name</th>
                                <th>payment_rate</th>
                                <th>payment_currency</th>
                                <th>payment_status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($payments as $payment): ?>
                                <tr>
                                    <td><?php echo $payment->id ?></td>
                                    <td><?php echo $payment->payment_code ?></td>
                                    <td><?php echo $payment->payment_name ?></td>
                                    <td><?php echo $payment->payment_rate ?></td>
                                    <td><?php echo $payment->payment_currency ?></td>
                                    <td><?php echo $payment->payment_status ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/payment/update/' . $payment->id) ?>" class="green"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->







<table id="restaurant_manager_wrapper"  class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">



</table>

<script>

    $(document).ready(function() {

        $('#restaurant_manager').DataTable();

    });

</script>