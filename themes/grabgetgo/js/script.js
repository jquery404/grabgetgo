
(function ($) {
    "use strict";

    var e = $(".middle-header"),
        t = $('<div id="wrapper"></div>');
    e.before(t);
    var i = t.offset().top,
        a = "fixed-top",
        n = $(window).scrollTop();

    
    $(window).on("load scroll resize", function() {
        var r = e.outerHeight(),
            o = $(this).scrollTop();
        o < n ? o <= i && (e.hasClass(a) && e.removeClass(a), t.height(0)) : o >= i + r + 20 && (e.addClass(a), t.height(r)), n = o
    });

    $( '.add_to_cart_button' ).on( 'click', function(){
       $('.load-spin', this).removeClass('d-none');
    });
        
    if ($("#newIn-slider").length && "undefined" != typeof Swiper) 
    {
        /*new Swiper("#newIn-slider", {
            navigation: {
                prevEl: "#newInPrev",
                nextEl: "#newInNext"
            },
            slidesPerView: 5,
            breakpoints: {
                575: {
                    slidesPerView: 2,
                    spaceBetween: 8
                },
                767: {
                    slidesPerView: 3,
                    spaceBetween: 8
                },
                991: {
                    slidesPerView: 4,
                    spaceBetween: 8
                },
                1199: {
                    slidesPerView: 5
                }
            }
        });*/

        new Swiper('.swiper-container', {
          slidesPerView: 5,
          spaceBetween: 50,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          breakpoints: {
            1024: {
              slidesPerView: 4,
              spaceBetween: 40,
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 30,
            },
            640: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
            320: {
              slidesPerView: 1,
              spaceBetween: 10,
            }
          }
        });
    }

    if ($("#detail-gallery").length && null != typeof Swiper) {
        var m = new Swiper("#detail-gallery", {
            slidesPerView: 4,
            spaceBetween: 5,
            navigation: {
                prevEl: "#detail-gallery-prev",
                nextEl: "#detail-gallery-next"
            }
        });
        
        $(".detail-gallery .swiper-slide").length <= 4 && $("#detail-gallery-prev, #detail-gallery-next").remove()
    }

    if($("#detail-slider").length && null != typeof Swiper) {
        var g = new Swiper("#detail-slider", {
            on: {
                init: function() {
                    setTimeout(function() {
                        $(".detail-gallery .swiper-slide:first-child .img-thumbnail").addClass("active")
                    }, 100)
                }
            }
        });

        g.on("slideChange", function() {
            m.slideTo(g.activeIndex);
            $(".detail-gallery .swiper-slide .img-thumbnail").removeClass("active");
            $(".detail-gallery .swiper-slide").eq(g.activeIndex).find(".img-thumbnail").addClass("active");
        });
    }


    // photo swiper
    var v = function(e) {
        e = void 0 !== e ? e : 0;

        var t, item, i = document.querySelectorAll(".pswp")[0];

        var a = (t = [], $("#detail-slider img").each(function(e, i) {
                item = {
                    src: i.getAttribute("src"),
                    w: parseInt(i.getAttribute("data-large_image_width"), 10),
                    h: parseInt(i.getAttribute("data-large_image_height"), 10)
                }, t.push(item)
            }), t);

        new PhotoSwipe(i, PhotoSwipeUI_Default, a, {
            index: e
        }).init()
    };
    $(".btn-zoom").click(function(e) {
        v(g.activeIndex), e.preventDefault()
    });

    $(".input-group-qty").each(function() {
        var e = $(this),
            t = e.find('input[type="number"]'),
            i = e.find(".btn-down"),
            a = e.find(".btn-up"),
            n = t.data("min"),
            r = t.data("max");
        n = null == n || "" == n || n < 0 ? 0 : n, r = null == r || "" == r || r < 0 ? 1e3 : r;
        t.change(function() {
            !$.isNumeric($(this).val()) || $(this).val() < n ? $(this).val(n) : $(this).val() > r && $(this).val(r)
        }), a.click(function() {
            t.val(parseInt(t.val()) + 1).trigger("change")
        }), i.click(function() {
            t.val(parseInt(t.val()) - 1).trigger("change")
        })
    });

    $(".input-group-qty input").on("focus", function() {
        $(this).one("mouseup", function() {
            return $(this).select(), !1
        }).select()
    });        


})(jQuery);