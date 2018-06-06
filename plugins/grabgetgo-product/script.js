
(function ($) {
    "use strict";

		var c;

    if ($("#quickview-slider").length && null != typeof Swiper) {
      
    }

    $('.gggQuickView').on('click', function() {
    	$("#quickviewModal .modal-content").html('');
    	$("#quickviewModal").modal("show");

    	$.get( gggproductajax.ajaxurl, { 
    			action: 'ggg_quickview_ajaxhandler',
        	product_id: $(this).data('id'),
        	nonce: $(this).data('nonce')
    	}).done(function(data){
    			$("#quickviewModal .modal-content").html(data);

    			if ($("#quickview-slider").length && null != typeof Swiper) {
    				if(c==undefined)
    					c = new Swiper("#quickview-slider", {
				          pagination: {
				              el: ".swiper-pagination",
				              clickable: !0
				          },
				          navigation: {
				              prevEl: "#quickview-prev",
				              nextEl: "#quickview-next"
				          },
				          lazy: !0
				      });
			      c.update();
			    }

    	});

		});


		

})(jQuery);