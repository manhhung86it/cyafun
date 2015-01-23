<?php if (!empty($success)): ?>
    <div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>
<form role="form" method="post" id='update-user-cyafun-form' name="update-user-cyafun-form" class="span8 form-area" enctype="multipart/form-data">
    <h1>Personal</h1>
    <div class="form-group input-update">
            <label for="image">Image:</label>
            <div class="input-group" style="margin-bottom: 5px;">
                <i class="fa fa-picture-o"></i> <input type="file" value="" name="image" id="image">
            </div>

            <?php if (!empty($data_error['image'])): ?>
                <label for="image" class="error"><?php echo $data_error['image'] ?></label>
            <?php endif; ?>
            <?php if (!empty($dataPost['us_avatar'])): ?>
                <img src="<?php echo base_url() . 'public/upload/' . $dataPost['us_avatar'] ?>" width="200" height="200">
            <?php else: ?>
                <img src="<?php echo base_url() . 'public/img/login-logo.png' ?>" width="200" height="200">
            <?php endif; ?>
    </div>
    <div class="form-group input-update">
            <label for="username">User Name *:</label>
            <div class="input-group">
                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['us_username'] ?>" name="username" id="username" placeholder="Enter User Name" disabled>
            </div>
            <?php if (!empty($data_error['username'])): ?>
                <label for="username" class="error"><?php echo $data_error['username'] ?></label>
            <?php endif; ?>
    </div>

    <div class="form-group input-update">
            <label for="nameDisplay">Name Display *:</label>
            <div class="input-group">
                <i class="fa fa-user"></i><input type="text" value="<?php echo $dataPost['us_name_display'] ?>" name="nameDisplay" id="nameDisplay" placeholder="Enter Name Display" required>
            </div>
            <?php if (!empty($data_error['nameDisplay'])): ?>
                <label for="nameDisplay" class="error"><?php echo $data_error['nameDisplay'] ?></label>
            <?php endif; ?>
    </div>

    <div class="form-group input-update">
            <label for="email" required>Email *:</label>
            <div class="input-group">
                <i class="fa fa-envelope-square"></i><input type="email" value="<?php echo $dataPost['us_email'] ?>"  class="required email" id="email" name="email" placeholder="Enter Email" >
            </div>
            <?php if (!empty($data_error['email'])): ?>
                <label for="email" class="error"><?php echo $data_error['email'] ?></label>
            <?php endif; ?>
    </div>
    
    <div class="register-submit">
        <input class="btn btn-success" type="submit" id="submit" value="Update">
    </div>
</form>