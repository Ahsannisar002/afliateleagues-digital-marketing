// First Slider
$(document).ready(function () {
    $('.slider-one').not('.slick-intialized').slick({
        autoplay: true,
        autoplaySpeed: 1800,
        dots: true,
        prevArrow: ".site-slider .slider-btn .prev",
        nextArrow: ".site-slider .slider-btn .next"
    });
});