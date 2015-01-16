<div class="cya-slider">
    <div class="slider-top group">
        <div class="mainslider group">
            <ul class="slides">
                <li>
                    <img src="<?php echo base_url(); ?>public/img/2014-12-19_165651.jpg" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>public/img/2014-12-19_165725.jpg" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>public/img/spin-and-go-hp-1.jpg" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>public/img/2014-12-19_165725.jpg" />
                </li>
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
                    <li>
                        <img src="<?php echo base_url(); ?>public/img/2014-12-19_165725.jpg" />
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>public/img/2014-12-19_165651.jpg" />
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>public/img/2014-12-19_165746.jpg" />
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>public/img/2014-12-19_165725.jpg" />
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>public/img/2014-12-19_165651.jpg" />
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>public/img/2014-12-19_165746.jpg" />
                    </li>                                
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

