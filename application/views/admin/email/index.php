<div class="row">
    <div class="col-xs-12">

        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Email template</h3>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-block alert-success">
                        <button data-dismiss="alert" class="close" type="button">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <?php echo $success ?>
                    </div>
                <?php endif; ?>
                <div class="table-header">
                    Results for "Email template"
                </div>

                <!-- <div class="table-responsive"> -->

                <!-- <div class="dataTables_borderWrap"> -->
                <div>
                    <table id="email_template" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Key</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($emails as $email): ?>
                                <tr>
                                    <td><?php echo $email['id'] ?></td>
                                    <td><?php echo $email['key'] ?></td>
                                    <td><?php echo $email['subject'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/email/update/' . $email['id']) ?>" class="green"><i class="ace-icon fa fa-pencil bigger-130"></i></a>
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



<table id="user_manager_wrapper"  class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">

</table>
<script>
    $(document).ready(function() {
        $('#email_template').DataTable();
    });
</script>