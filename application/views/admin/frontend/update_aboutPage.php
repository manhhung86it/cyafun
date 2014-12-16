<div class="service">
    <!-- Start service -->
    <div class="">
        <div class="row">
            <form role="form" method="post" action="" id="form-about-update" class="span8" enctype="multipart/form-data">
                <div class="col-xs-6 center-block" style="float: none;">
                    <div class="table-update center-block span6">                     
                        <div class="form-group input-update">
                            <label for="image">Image:</label>
                            <div class="input-group">
                                <input type="file" value="" class="form-control input-lg" name="image" id="image">
                            </div>

                            <?php if (!empty($data_error['image'])): ?>
                                <label for="image" class="error"><?php echo $data_error['image'] ?></label>
                            <?php endif; ?>
                            <?php if (!empty($features['image'])): ?>
                                <img src="<?php echo base_url() . 'public/upload/frontend/' . $features['image'] ?>" width="200" height="200">
                            <?php endif; ?>
                        </div>
                        <div class="form-group input-update">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <input type="text" value="<?php echo!empty($features['title']) ? $features['title'] : '' ?>" class="form-control input-lg" name="title" id="title">

                            </div>
                            <?php if (!empty($data_error['title'])): ?>
                                <label for="title" class="error"><?php echo $data_error['title'] ?></label>
                            <?php endif; ?>
                            <div id="title_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="status">Status:</label>
                            <div class="input-group">
                                <select name="status" id="status">
                                    <option value="0" <?php echo (isset($features['status']) && $features['status'] == 0) ? 'selected' : ''; ?>>Deactive</option>
                                    <option value="1" <?php echo (!isset($features['status']) || $features['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="name">Order:</label>
                            <div class="input-group">
                                <input type="text" value="<?php echo!empty($features['order']) ? $features['order'] : '' ?>" class="form-control input-lg" name="order" id="order">

                            </div>
                            <?php if (!empty($data_error['order'])): ?>
                                <label for="order" class="error"><?php echo $data_error['order'] ?></label>
                            <?php endif; ?>
                            <div id="order_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="content">Content:</label>
                            <textarea id="content" name="content" class="form-control update-textarea" rows="3">
                                <?php if (!empty($features['content'])): ?>
                                    <?php echo $features['content']; ?>
                                <?php endif; ?>
                            </textarea>
                            <?php if (!empty($data_error['content'])): ?>
                                <label for="name" class="error"><?php echo $data_error['content'] ?></label>
                            <?php endif; ?>
                            <div id="content_validate">
                            </div>
                        </div>                        
                        <?php if ($id == 0) { ?>
                            <div class="register-submit">
                                <input class="update btn btn-info" type="submit" name="upload_features"  id="update_features" value="ADD">
                            </div>
                            <div class="more-order">
                                <a style="cursor: pointer;" onclick="history.back(1);">Back</a>
                            </div>
                        <?php } ?>
                        <?php if ($id != 0) { ?>
                            <div class="register-submit">
                                <input type="submit" name="upload_features"  id="update_features" value="Update" class="btn btn-info">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <span id="feature"></span>
</div>
<script>
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"

        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}

        ]

    });
</script>