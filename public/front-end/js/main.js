(function ($) {
 "use strict";
    
$(document).ready(function() {
 
      $("#slider").owlCarousel({

          navigation : true,
          slideSpeed : 200,
          paginationSpeed : 500,
          singleItem:true,
          items: 1,
          autoplay: 100,
          loop: true,
          nav:true,
          navText:[
                "<i class='fa fa-angle-left fa-2x'></i>",
                "<i class='fa fa-angle-right fa-2x'></i>"
            ],
      });
    
     $('.product-slide').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        navText:[
                "<i class='fa fa-angle-left fa-2x'></i>",
                "<i class='fa fa-angle-right fa-2x'></i>"
            ],
        responsive:{
            0:{items:1},
			448:{items:2},
            768:{items:3},
            1000:{items:4 },
			1200:{items:4 }
        }
    })
 

    
}); //end owl slider


/************
BACK TO TOP BUTTON
************/
    
$(window).load(function(){
if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
});    

    

    
    
})(jQuery); 
