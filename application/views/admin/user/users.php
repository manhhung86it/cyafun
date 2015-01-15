<div class="service">
    <!-- Start service -->
    <div class="users_manage">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Manage Users</h3>

                <!-- <div class="table-responsive"> -->

                <!-- <div class="dataTables_borderWrap"> -->
                <div>
                    <table id="users_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class=""></th>
                                <th>Name</th>
                                <th>Name display</th>   
                                <th>Email</th>
                                <th>Balance</th>
                                <th>Status</th>
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
<script>
    var users_manager = $('#users_manager').dataTable({
        "bLengthChange": "table-header",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + 'index.php/admin/user/ajax_list_user',
        "aoColumns": [
            {"sTitle": "Id", "iDataSort": "us_id", "mData": "us_id", "bSearchable": false},
            {"sTitle": "Name", "iDataSort": "us_username", "mData": "us_username"},
            {"sTitle": "Name display", "iDataSort": "us_name_display", "mData": "us_name_display"},
            {"sTitle": "Email", "iDataSort": "us_email", "mData": "us_email"},
            {"sTitle": "Balance", "iDataSort": "us_balance", "mData": "us_balance"},
            {"sTitle": "Status", "iDataSort": "us_status", "mData": "us_status"},
            {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_user},
        ],
    });
    /**
     * render_action
     */
    function render_action_user(data, type, full) {
        var html = '<div class="hidden-sm hidden-xs action-buttons">';
        html += '<a href="javascript:delete_user(' + full.us_id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
        html += '<a href="' + base_url + 'index.php/admin/user/update_user/' + full.us_id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
        html += '</div>';
        return html;
    }
    function delete_user(id) {
        var cf = confirm('Do you want delete this record?');
        if (cf) {
            $.ajax({
                url: base_url + 'index.php/admin/user/delete_user',
                type: 'POST',
                data: {'us_id': id},
                success: function(data) {
                    users_manager.fnDraw(false);
                }
            });
        }
    }
</script>