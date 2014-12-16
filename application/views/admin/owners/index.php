<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Owners</h3>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-block alert-success">
                        <button data-dismiss="alert" class="close" type="button">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <div class="table-header">
                    Results for "owners"
                </div>
                <div>
                    <table id="owners_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['id'] ?></td>
                                    <td><?php echo $user['firstname']." ".$user['lastname'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td><?php echo $user['phone'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/owners/update/' . $user['id']) ?>" class="green"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
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

        $('#owners_manager').DataTable();

    });

</script>