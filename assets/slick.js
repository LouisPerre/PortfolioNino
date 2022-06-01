import $ from 'jquery'
import 'slick-carousel'

$('.my-carousel').slick({
    autoplay: true,
    dots: false,
    arrows: false,
    autoplaySpeed: 2500,
    draggable: false,
    pauseOnFocus: false,
    pauseOnHover: false
});

$('.my-second-carousel').slick({
    dots: true,
    arrows: false,
    autoplaySpeed: 2000,
    pauseOnHover: false,
    pauseOnDotsHover: true,
    autoplay: true,
});

$('.carouselVideo').slick({
    draggable: true,
    dots: false,
    arrows: false,
    autoplaySpeed: 2000,
    autoplay: true,
    pauseOnHover: true,
    pauseOnFocus: false
});