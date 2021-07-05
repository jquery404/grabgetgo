
(function ($) {
    'use strict';

    // [ JS Active Code Index ]

    // :: 1.0 Owl Carousel Active Code
    // :: 2.0 Slick Active Code
    // :: 3.0 Footer Reveal Active Code
    // :: 4.0 ScrollUp Active Code
    // :: 5.0 CounterUp Active Code
    // :: 6.0 onePageNav Active Code
    // :: 7.0 Magnific-popup Video Active Code
    // :: 8.0 Sticky Active Code
    // :: 9.0 Preloader Active code

    // :: 1.0 Owl Carousel Active Code
    if ($.fn.owlCarousel) {
        $('.loopy').owlCarousel({
            center: true,
            items:1,
            autoplay: true,
            smartSpeed: 1500,
            loop:true,
            navText: ["<i class='pe-7s-angle-left'</i>", "<i class='pe-7s-angle-right'</i>"],
        });
        $(".welcome_slides").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            nav: true,
            navText: ["<i class='pe-7s-angle-left'</i>", "<i class='pe-7s-angle-right'</i>"]
        });
        $(".app_screenshots_slides").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            margin: 30,
            center: true,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 3
                },
                992: {
                    items: 5
                }
            }
        });
    }

    // :: 2.0 Slick Active Code
    if ($.fn.slick) {

        $('.imgslider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        }).on('beforeChange', function(event, slick, currentSlide, nextSlide){
            if(nextSlide == 0)
                $('.exp').html('Brands &amp; Corporations.');                

            else if(nextSlide == 1)
                $('.exp').html('Web &amp; Mobile Application.');

            else if(nextSlide == 2)
                $('.exp').html('Enterprise Application.');

        });
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 500,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            slide: 'div',
            autoplay: true,
            centerMode: true,
            centerPadding: '30px',
            mobileFirst: true,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>'
        });
    }

    // :: 3.0 Footer Reveal Active Code
    if ($.fn.footerReveal) {
        $('footer').footerReveal({
            shadow: true,
            shadowOpacity: 0.3,
            zIndex: -101
        });
    }

    // :: 4.0 ScrollUp Active Code
    /*if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>'
        });
    }*/

    // :: 5.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 6.0 onePageNav Active Code
    if ($.fn.onePageNav) {
        $('#nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 2000,
            easing: 'easeOutQuad'
        });
    }

    // :: 7.0 Magnific-popup Video Active Code
    if ($.fn.magnificPopup) {
        $('.video_btn').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false
        });
    }

    $('a[href="#"]').click(function ($) {
        $.preventDefault()
    });


    $('input, textarea').focus(function(){
        if($(this).hasClass('error'))
            $(this).removeClass('error');
    });

    $('.contact-now').click(function() {
        var name = $('input[name="name"]');
        var email = $('input[name="email"]');
        var phone = $('input[name="phone"]');
        var message = $('textarea[name="message"]');

        if(name.val() == '') name.addClass('error'); else name.removeClass('error');
        if(email.val() == '') email.addClass('error'); else email.removeClass('error');
        if(message.val() == '') message.addClass('error'); else message.removeClass('error');
        if(recaptchachecked !== true) $('.g-recaptcha').addClass('error'); else $('.g-recaptcha').removeClass('error');

        
        if(name.val() != '' && email.val() != '' && message.val() != ''){

            $('.contact_input_area').html('<div class="success-wrap"><img src="img/bg-img/sent.gif" /></div>');
            $.post('form.php', {
                    t: 'p', 
                    name: name.val(), 
                    email: email.val(), 
                    message: message.val(), 
                    phone: phone.val(),
                }, function(response) {

                swal("Thank you so much for contacting us. We will get back to you within 2 hours.");
            });
        }
    });

    $('.nk-drop-item').click(function(){
        var childMenu = $('.dropdown', this);
        $('.nk-nav li').each(function(){
            $(this).css("opacity", 0);
        });
    });

    var $window = $(window);

    if ($window.width() > 767) {
        new WOW().init();
    }

    // :: 8.0 Sticky Active Code
    $window.on('scroll', function () {
        if ($window.scrollTop() > 48) {
            $('.header_area').addClass('sticky slideInDown');
        } else {
            $('.header_area').removeClass('sticky slideInDown');
        }
    });

    // :: 9.0 Preloader Active code
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

})(jQuery);


function openNav() {
  $("#nav-full").addClass("shownav");
}

function closeNav() {
  $("#nav-full").removeClass("shownav");
}

var recaptchachecked;

function recaptchaCallback() {
    recaptchachecked = true;
}


// Start of Tawk.to Script
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://web.archive.org/web/20190622115745/https://embed.tawk.to/5ac867b8d7591465c70945d3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

