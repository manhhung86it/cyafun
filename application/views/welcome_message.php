<div class="cya-slider">
    <div class="slider-top group">
        <div class="mainslider group">
            <ul class="slides">
                <?php foreach ($sliderTop as $key => $value) { ?>
                    <li>
                        <img src="<?php echo base_url(); ?>public/upload/frontend/<?php echo $value['image']; ?>" />
                    </li>
                <?php } ?>
            </ul>
        </div>
        <script type="text/javascript">
            $(window).load(function() {
                $('.mainslider').flexslider({
                    animation: "slide",
                    start: function(slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
    </div>

    <div class="how-to-play group">
        <div class="how-to-play-content how-to-play-content-first col-xs-6  col-sm-3">
            <div class="triangle-left"></div>
            HOW TO <br><span> PLAY</span><span style="font-size: 20px; top: -7px; left: 15px;" class="glyphicon glyphicon-play"></span>
        </div>
        <div class="how-to-play-content col-xs-6 col-sm-3">
            <div class="how-to-play-content-title">
                <div class="top-player-number">1</div>
                Register
            </div>
            Simple registration. 
            You’ll be playing in no time
        </div>
        <div class="how-to-play-content col-xs-6 col-sm-3">
            <div class="how-to-play-content-title">
                <div class="top-player-number">2</div>
                Download
            </div>
            Download game from list game
            Very fast & forever on your mobile.
        </div>
        <div class="how-to-play-content col-xs-6 col-sm-3">
            <div class="how-to-play-content-title">
                <div class="top-player-number">3</div>
                Play
            </div>
            Improve your skills against 
            players at your level
            <div class="triangle-right"></div>
        </div>
    </div>     

    <div class="slider-bottom group">
        <div class="slider-bottom-header">
            <div class="slider-bottom-header-content">
                <hr>
                <div class="slider-bottom-header-text">TOURNAMENTS</div>
                <hr>
            </div>
        </div>
        <section class="slider">
            <div class="flexslider carousel">
                <ul class="slides">
                    <?php foreach ($sliderSecond as $key => $value) { ?>
                        <li>
                            <img src="<?php echo base_url(); ?>public/upload/frontend/<?php echo $value['image']; ?>" />
                        </li>
                    <?php } ?>                               
                </ul>
            </div>
        </section>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
//                    animationLoop: false,
                    itemWidth: 260,
                    itemMargin: 5,
//                    pausePlay: true,
                    controlNav: false,
                    start: function(slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
    </div>                
</div>


<div class="body-top group">
    <div class="tab-header-before">
        <div class="tab-header-before-top"></div>
        <div class="tab-header-triangle"></div>
    </div>
    <div class="top-player col-sm-4">
        <div class="tab-header body-header"><img src="<?php echo base_url(); ?>public/img/icon-top-player.png" />TOP PLAYERS</div>
        <ul class="tabs">
            <li><a href="#today" class="active">Today</a></li>
            <li><a href="#week">This Week</a></li>
            <li><a href="#allTime">All Times</a></li>
        </ul>
        <div class="tab_container">
            <div id="today" class="tab_content">
                <ul>                                      
                    <li><div class="top-player-number">1</div><div class="top-player-content">kien</div><div class="top-player-count">2048</div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content">nguyen</div><div class="top-player-count">1024</div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content">van</div><div class="top-player-count">512</div></li>
                </ul> 
            </div>

            <div id="week" class="tab_content">
                <ul>  
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>                                    
                </ul> 
            </div>

            <div id="allTime" class="tab_content">
                <ul> 
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                    <li><div class="top-player-number">1</div><div class="top-player-content"></div><div class="top-player-count"></div></li>
                </ul> 
            </div>
        </div>

    </div>

    <div class="recomment-game col-sm-8">
        <div class="recomment-game-header body-header"><div class="triangle-right" style="bottom: 30px; left: 5px;"></div>RECOMMENDED GAMES</div>
        <div class="recomment-game-header-content">
            <ul class="group">
                <?php foreach ($recommendGame as $key => $value) { ?>                 
                    <li class="group">
                        <div class="recomment-game-image col-xs-5 col-sm-4"><img src="<?php echo base_url(); ?>public/upload/frontend/<?php echo $value['image']; ?>" class="img-responsive" /></div>
                        <div class="recomment-game-text col-xs-7 col-sm-8">
                            <h3><?php echo $value['title']; ?></h3>
                            <?php echo $value['content']; ?>
                        </div>
                    </li>
                <?php } ?> 
            </ul>
            <div class="">1,2,3,4</div>
        </div>
    </div>
</div>

<div class="body-bottom group">
    <div class="game-focus col-sm-4">
        <div class="body-header"><img src="<?php echo base_url(); ?>public/img/icon-game-focus.png" />Game focus</div>
        <div class="game-focus-content">
            <?php foreach ($gameFocus as $key => $value) { ?>
                <img src="<?php echo base_url(); ?>public/upload/frontend/<?php echo $value['image']; ?>" />
            <?php } ?>  
        </div>
    </div>
    <div class="body-new col-sm-8">
        <div class="news-header body-header"><div class="triangle-right" style="bottom: 7px; left: 5px;"></div>News</div>
        <div class="body-new-content">
            <ul class="group">
                <?php foreach ($news as $key => $value) { ?> 
                    <li class="group col-xs-6">
                        <div class="recomment-game-image col-xs-5 col-sm-4"><img src="<?php echo base_url(); ?>public/upload/frontend/<?php echo $value['image']; ?>" class="img-responsive" /></div>
                        <div class="recomment-game-text col-xs-7 col-sm-8">
                            <h3><?php echo $value['title']; ?></h3>
                            <?php echo $value['content']; ?>
                        </div>
                    </li>
                <?php } ?>                 
            </ul>
            <div class="">1,2,3,4</div>
        </div>
    </div>
</div>