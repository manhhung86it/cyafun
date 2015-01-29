<div class="service">
    <!-- Start service -->
    <div class="users_manage">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <a class="btn btn-success" href="<?php echo site_url('admin/frontend/update_Recommend_Game') ?>">Add new</a>
                </div>
                <h3 class="header smaller lighter blue">Edit Game Focus</h3>
                <div class="table-header">
                </div>
                <div>
                    <table id="recommend_game_manager" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class=""></th>
                                <th>image</th>
                                <th>Title</th>
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
    var recommend_game_manager = $('#recommend_game_manager').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": base_url + 'index.php/admin/frontend/ajax_list_Recommend_Game',
        "aoColumns": [
            {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
            {"sTitle": "Image", "iDataSort": "image", "mData": "image", "mRender": render_image_features},
            {"sTitle": "Content", "iDataSort": "content", "mData": "content", "bSearchable": false},
            {"sTitle": "", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_menu_top},
        ],
    });
    var html = '';
    html += $("#features_manager_wrapper #features_manager_length").html();
    html += '<div class="col-xs-6"><div class="btn btn-primary"><a style="color: #fff;" href="' + base_url + 'index.php/admin/features/update_features' + '">Add Features</a></div></div>';
    $("#features_manager_wrapper #features_manager_length").html(html);


    /**
     * render_action
     */
    function render_action_menu_top(data, type, full) {
        var html = '<div class="action-buttons">';
        html += '<a href="javascript:delete_features(' + full.id + ')" class="red"><i class="a fa fa-trash-o bigger-130"></i></a>';
        html += '<a href="' + base_url + 'index.php/admin/frontend/update_Recommend_Game/' + full.id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
        html += '</div>';
        return html;
    }
    /**
     * render_image
     */
    function render_image_features(data, type, full) {
        return '<img src="' + public_url + 'upload/frontend/' + data + '" with=100 height=100 />';
    }

    /**
     * delete_user
     */
    function delete_features(id) {
        var cf = confirm('Do you want delete this record?');
        if (cf) {
            $.ajax({
                url: base_url + 'index.php/admin/frontend/delete_features',
                type: 'POST',
                data: {'id': id},
                success: function(data) {
                    recommend_game_manager.fnDraw(false);
                }
            });
        }
    }
</script>