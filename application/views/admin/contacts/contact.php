<div class="service">
    <!-- Start service -->
    <div class="users_manage">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12">
                <h3 class="header smaller lighter blue">Contact Manager</h3>
                <div class="table-header">
                </div>
                <div>
                    <table id="contact_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Reply</th>
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
    var contact_manager = $('#contact_manager').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + 'index.php/admin/contact/ajax_list_contact',
        "aoColumns": [
            {"sTitle": "Id", "iDataSort": "id", "mData": "id"},
            {"sTitle": "Email", "iDataSort": "email", "mData": "email"},
            {"sTitle": "Message", "iDataSort": "message", "mData": "message"},
            {"sTitle": "Reply", "iDataSort": "reply", "mData": "reply", "mRender": render_contact_reply},
            {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_contact},
        ],
    });


    /**
     * render_action
     */
    function render_action_contact(data, type, full) {
        var html = '<div class="action-buttons">';
        html += '<a href="javascript:delete_contact(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
        html += '</div>';
        return html;
    }
    /**
     * render_image
     */
    function render_contact_reply(data, type, full) {
        var html = "";
        if (full.reply == 0) {
            html += 'no';
        }
        else {
            html += 'yes';
        }

        return html;
    }

    /**
     * delete_user
     */
    function delete_contact(id) {
        var cf = confirm('Do you want delete this record?');
        if (cf) {
            $.ajax({
                url: base_url + 'index.php/admin/contact/delete_contact',
                type: 'POST',
                data: {'id': id},
                success: function(data) {
                    contact_manager.fnDraw(false);
                }
            });
        }
    }
    </script>
