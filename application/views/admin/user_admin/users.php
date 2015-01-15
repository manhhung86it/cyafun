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
                    <table id="users_admin_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class=""></th>
                                <th>Name</th>
                                <th>Full Name</th>   
                                <th>Email</th>
                                <th>Group</th>
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
    var users_admin_manager = $('#users_admin_manager').dataTable({
        "bLengthChange": "table-header",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + 'index.php/admin/user_admin/ajax_list_user',
        "aoColumns": [
            {"sTitle": "Id", "iDataSort": "ad_id", "mData": "ad_id", "bSearchable": false},
            {"sTitle": "Name", "iDataSort": "ad_username", "mData": "ad_username"},
            {"sTitle": "Full Name", "iDataSort": "ad_fullname", "mData": "ad_fullname"},
            {"sTitle": "Email", "iDataSort": "ad_email", "mData": "ad_email"},
            {"sTitle": "Group", "iDataSort": "ad_group", "mData": "ad_group"},
            {"sTitle": "Status", "iDataSort": "ad_status", "mData": "ad_status"},
            {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_user},
        ],
    });
    /**
     * render_action
     */
    function render_action_user(data, type, full) {
        var html = '<div class="hidden-sm hidden-xs action-buttons">';
        html += '<a href="javascript:delete_user(' + full.ad_id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
        html += '<a href="' + base_url + 'index.php/admin/user_admin/update_user/' + full.ad_id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
        html += '</div>';
        return html;
    }
    function delete_user(id) {
        var cf = confirm('Do you want delete this record?');
        if (cf) {
            $.ajax({
                url: base_url + 'index.php/admin/user_admin/delete_user',
                type: 'POST',
                data: {'ad_id': id},
                success: function(data) {
                    users_admin_manager.fnDraw(false);
                }
            });
        }
    }
</script>