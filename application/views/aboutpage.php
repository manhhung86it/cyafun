<div class="service">
    <!-- Start service -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 feature-header">
                <span> <img src="<?php echo base_url(); ?>public/img/about_title.png" alt="" title="" ></span>
                <span class="feature-header-text"><h3 class="header smaller lighter">ABOUT</h3></span>              
            </div>
            <?php foreach ($features as $feature) { ?>
                <div class="col-xs-12 feature-content">
                    <div class="col-xs-12 col-sm-4 feature-content-left">
                        <img src="<?php echo base_url(); ?>public/upload/frontend/<?php echo $feature['image']; ?>" alt="" title="" width="150" height="95">
                        <span><?php echo $feature['title']; ?></span>
                    </div>
                    <div class="col-xs-12 col-sm-8 feature-content-right">
                        <?php echo $feature['content']; ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>