<div class="service">
    <!-- Start service -->
    <div class="">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="row">
            <form role="form" method="post" action="" id="form-contactPage-update" class="span8" enctype="multipart/form-data">
                <div class="col-xs-6 center-block" style="float: none;">
                    <div class="table-update center-block span6">
                        <div class="logo-register">
                            <span>UPDATE CONTACT PAGE</span>
                        </div>
                        <div class="form-group input-update">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <input type="text" value="<?php echo!empty($contact['title']) ? $contact['title'] : '' ?>" class="form-control input-lg" name="title" id="title">

                            </div>
                            <?php if (!empty($data_error['title'])): ?>
                                <label for="title" class="error"><?php echo $data_error['title'] ?></label>
                            <?php endif; ?>
                            <div id="title_validate">
                            </div>
                        </div>
                        <div class="form-group input-update">
                            <label for="content">Content:</label>
                            <textarea id="content" name="content" class="form-control update-textarea" rows="3">
                                <?php if (!empty($contact['content'])): ?>
                                    <?php echo $contact['content']; ?>
                                <?php endif; ?>
                            </textarea>
                            <?php if (!empty($data_error['content'])): ?>
                                <label for="name" class="error"><?php echo $data_error['content'] ?></label>
                            <?php endif; ?>
                            <div id="content_validate">
                            </div>
                        </div> 
                        <div class="register-submit">
                            <input type="submit" name="upload_features"  id="update_features" value="Update" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
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