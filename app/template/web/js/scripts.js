$(function(){
    /* Carousel Header */
    $("#carousel").carousel({
        interval: true
    });

    $("#myCarousel").carousel({
        interval: false
    });

    /* Carousel sidebar */
    $('#carousel-sidebar').carousel({
        interval: false
    });

    /* Search menu */
    $('.search').on('click',function(){
        $(".main-menu .navbar-form").slideToggle();
    });
});

$(document).ready(function(){
    var carouselSidebarImgWidth = $("#carousel-sidebar .active img").width();
    $("#carousel-sidebar img").each(function(){
        $(this).attr('width',carouselSidebarImgWidth);
    });

    $("#carousel-sidebar .sidebar-carousel-caption")
        .css('max-width',carouselSidebarImgWidth + 'px');

    $("#carousel-sidebar .carousel-indicators")
        .css('max-width', carouselSidebarImgWidth + 'px');
    $(".sidebar .banner")
        .css('max-width', carouselSidebarImgWidth + 'px');

});

