<div class="page-header">

    <h1><?php echo $title  ?></h1>

</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
            <?php if (!empty($errors)): ?>
                <div class="bg-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="name">Name of Restaurant *: </label>
                <div class="col-sm-9">
                    <input type="text" id="name" autocomplete="off" value="<?php echo!empty($restaurant['name']) ? $restaurant['name'] : '' ?>" name="name" placeholder="enter name of restaurant" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="user_id"> Owner *: </label>
                <div class="col-sm-9"> 
                    <select id="user_id" name="user_id" class="suggest-province-code valid">
                        <option value=""></option>
                        <?php
                        foreach ($availableUser as $key => $value) {
                            if ( $value->id == $restaurant['user_id'] )
                                echo '<option value="' . $value->id . '" selected="selected">' . $value->firstname.' '.$value->lastname . '</option>';
                            else
                                echo '<option value="' . $value->id . '">' . $value->firstname.' '.$value->lastname . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="address1">Address 1 *: </label>
                <div class="col-sm-9">
                    <input type="text" id="address1" autocomplete="off" value="<?php echo!empty($restaurant['address1']) ? $restaurant['address1'] : '' ?>" name="address1" placeholder="enter address1" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="address2">Address 2 *: </label>
                <div class="col-sm-9">
                    <input type="text" id="address2" autocomplete="off" value="<?php echo!empty($restaurant['address2']) ? $restaurant['address2'] : '' ?>" name="address2" placeholder="enter address2" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="suburb">Suburb *: </label>
                <div class="col-sm-9">
                    <input type="text" id="suburb" autocomplete="off" value="<?php echo!empty($restaurant['suburb']) ? $restaurant['suburb'] : '' ?>" name="suburb" placeholder="enter suburb" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="postcode">Postcode *: </label>
                <div class="col-sm-9">
                    <input type="text" id="postcode" autocomplete="off" value="<?php echo!empty($restaurant['postcode']) ? $restaurant['postcode'] : '' ?>" name="postcode" placeholder="enter postcode" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="state">State *: </label>
                <div class="col-sm-9">
                    <select id="state" name="state" class="suggest-province-code valid">
                        <option value=""></option>
                        <?php
                        foreach ($state_restaurant as $key => $value) {
                            if (strcasecmp($restaurant['state'], $value) ==0 )
                                echo '<option value="' . $value . '" selected="selected">' . $value . '</option>';
                            else
                                echo '<option value="' . $value . '">' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="phone">Phone: </label>
                <div class="col-sm-9">
                    <input type="text" id="phone" autocomplete="off" value="<?php echo!empty($restaurant['phone']) ? $restaurant['phone'] : '' ?>" name="phone" placeholder="enter phone" class="col-xs-10 col-sm-5" />
                </div>
            </div>
            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div><!-- /.col -->
</div><!-- /.row -->
