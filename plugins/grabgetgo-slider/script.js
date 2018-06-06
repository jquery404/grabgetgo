
(function ($) {
    "use strict";


    if($(".home-slider").length && "undefined" != typeof Swiper) {
    		
		    var breakpoint = function(){
		    	return window.getComputedStyle(document.querySelector("body"), ":before").getPropertyValue("content").replace(/\"/g, "");
				};

	    	var s = function() {
	        $("[data-cover]").each(function() {
	            var e = $(this);
	            e.css("background-image", "url(" + decodeURIComponent(e.data("cover")) + ")");
	            switch (breakpoint()) {
	                case "xs":
	                    e.attr("data-xs-height") && e.css("height", e.data("xs-height"));
	                    break;
	                case "sm":
	                    e.attr("data-sm-height") && e.css("height", e.data("sm-height"));
	                    break;
	                case "md":
	                    e.attr("data-md-height") && e.css("height", e.data("md-height"));
	                    break;
	                case "lg":
	                    e.attr("data-lg-height") && e.css("height", e.data("lg-height"));
	                    break;
	                case "xl":
	                    e.attr("data-xl-height") && e.css("height", e.data("xl-height"))
	            }
	        })
	    	};

	    	s();

	    	$(window).resize(function() {
	    		s();

	    	});

		    var d = new Swiper(".home-slider", {
		          loop: !0,
		          pagination: {
		              el: ".swiper-pagination",
		              clickable: !0
		          },
		          navigation: {
		              prevEl: "#home-slider-prev",
		              nextEl: "#home-slider-next"
		          },
		          autoplay: {
		              delay: 2500,
		              disableOnInteraction: !1
		          },
		          on: {
		              init: function() {
		                  setTimeout(function() {
		                      $(".home-slider").find(".swiper-slide-active .animate").each(function() {
		                          $(this).addClass($(this).data("animate")).addClass("visible")
		                      })
		                  }, 100)
		              }
		          }
		    });

		    d.on("slideChange", function() {
		        d.slides.find(".animate").each(function() {
		            $(this).removeClass($(this).data("animate")).removeClass("visible")
		        }), $(d.slides[d.activeIndex]).find(".animate").each(function() {
		            $(this).addClass($(this).data("animate")).addClass("visible")
		        })
		    })
		}


})(jQuery);