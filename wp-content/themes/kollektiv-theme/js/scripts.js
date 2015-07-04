jQuery(document).ready(function($){


  $("a.menu-btn").on("click", function() {
    $(this).add("nav, nav a, .navlinks li, .shopping-cart-icon").toggleClass("show");
  });
	
  // Cache the Window object
  $window = $(window);
   // PARALLAX IMAGES

  $('section[data-type="background"]').each(function(){
    
    var $bgobj = $(this); // assigning the object

    $(window).scroll(function() {
  		// Scroll the background at var speed

  		// the yPos is a negative value because we're scrolling it UP!								
  		var yPos = -($window.scrollTop() / $bgobj.data('speed')); 

  		// Put together our final background position
  		var coords = '50% '+ yPos + 'px';

  		// Move the background
  		$bgobj.css({ backgroundPosition: coords });

    }); // window scroll Ends
	});	



   	// LOGO ANIMATION
  
  $(".logo").mouseenter(function() {
      
    var $this = $('.logo_o')
  	
  	if(!$this.hasClass('spin')){
      	$this.addClass('spin');
  	}
  	else {
   		$this.removeClass('spin');
    	setTimeout(function(){
        $this.addClass('spin');
      }, 20);
    }
  }); 

	$(".logo").mouseenter(function() {
				
		    $(".logo_g").filter(':not(:animated)').animate({ marginTop: "40px", opacity: 0.3 }, 400);
		    $(".logo_g").animate({ marginTop: "0", opacity: 1 }, 500);

		    $(".logo_k").filter(':not(:animated)').animate({ marginLeft: "100px", opacity: 0.5 }, 300);
		    $(".logo_k").animate({ marginLeft: "0", opacity: 1 }, 600);
		    //$(".logo_o").filter(':not(:animated)').animate({ marginLeft: "40px"}, 600);

		    $(".logo_a").filter(':not(:animated)').animate({ opacity: 0.3 }, 200);
		    $(".logo_a").animate({ opacity: 1 }, 600);

		    logoCount++;	   
	});

  // Change contact form submit button text to 'send' instead
  $('.contact-form_wrapper input[type=submit]').val('SEND');

/* 
 * Create HTML5 elements for IE's sake
 */

document.createElement("article");
document.createElement("section");

});