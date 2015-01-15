$(document).ready(function() {
    $('.tab_content:not(:first)').hide();
    $('.tabs li a').click(function() {
        $('.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.tab_content').hide();

        var activeTab = $(this).attr('href');
        //activeTab = #news// activeTab =#random
        $(activeTab).fadeIn();
        return false;
    });

})

//
//$(function() {
//    var jcarousel = $('.any-class');
//
//    jcarousel
//            .on('jcarousel:reload jcarousel:create', function() {
//                var width = jcarousel.innerWidth();
//
//                if (width >= 600) {
//                    width = width / 3;
//                } else if (width >= 350) {
//                    width = width / 2;
//                }
//
//                jcarousel.jcarousel('items').css('width', width + 'px');
//            })
//});