$(document).ready(function(){
    var counter = 1;

    $('.js-btn-left').click(function(){
        $(this).parent().removeClass('animated fadeInRight');
        $(this).parent().addClass('animated fadeOutRight');
        $(this).parent().prev().addClass('animated fadeInLeft section-active');
        $(this).parent().removeClass('section-active animated fadeOutRight');
    });


    $('.js-btn-right').click(function(){
        $(this).parent().removeClass('animated fadeInLeft');
        $(this).parent().addClass('animated fadeOutLeft');
        $(this).parent().next().addClass('animated fadeInRight section-active');
        $(this).parent().removeClass('section-active animated fadeOutLeft');
    });
});
