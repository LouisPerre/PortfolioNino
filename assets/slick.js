import $ from 'jquery'
import 'slick-carousel'

$(document).ready(function () {
    $('.my-carousel').slick({
        autoplay: true,
        dots: false,
        arrows: false,
        autoplaySpeed: 2500,
        draggable: false,
        pauseOnFocus: false,
        pauseOnHover: false
    });
})


$(document).ready(function () {
    $('.my-second-carousel').slick({
        dots: true,
        arrows: false,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        pauseOnDotsHover: true,
        autoplay: true,
    });
})

$(document).ready(function() {
    $('.carouselVideo').slick({
        draggable: true,
        dots: false,
        arrows: false,
        autoplaySpeed: 2000,
        autoplay: true,
        pauseOnHover: true,
        pauseOnFocus: false
    });
})

// ===== Scroll to Top ====
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {    // If page is scrolled more than 50px
        $('#top').fadeIn("fast");       // Fade in the arrow
    } else {
        $('#top').fadeOut("fast");      // Else fade out the arrow
    }
});
$('#top').click(function() {            // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                   // Scroll to top of body
    }, 500);
});