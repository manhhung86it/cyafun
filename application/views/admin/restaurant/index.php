<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Restaurants</h3>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-block alert-success">
                        <button data-dismiss="alert" class="close" type="button">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <div class="table-header">
                    Results for "Restaurant"
                </div>
                <div>
                    <table id="restaurant_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Owner</th>
                                <th>Address1</th>
                                <th>Address2</th>
                                <th>Name Of Restaurant</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($restaurants as $restaurant): ?>
                                <tr>
                                    <td><?php echo $restaurant['id'] ?></td>
                                    <td><?php echo $restaurant['firstname']." ".$restaurant['lastname'] ?></td>
                                    <td><?php echo $restaurant['address1'] ?></td>
                                    <td><?php echo $restaurant['address2'] ?></td>
                                    <td><?php echo $restaurant['name'] ?></td>
                                    <td><?php echo $restaurant['phone'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/restaurant/update/' . $restaurant['id']) ?>" class="green"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
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