jQuery(document).ready(function(e){e("a.menu-btn").on("click",function(){e(this).add("nav, nav a, .navlinks li, .shopping-cart-icon").toggleClass("show")});$window=e(window);e('section[data-type="background"]').each(function(){var t=e(this);e(window).scroll(function(){var e=-($window.scrollTop()/t.data("speed")),n="50% "+e+"px";t.css({backgroundPosition:n})})});e(".logo").mouseenter(function(){var t=e(".logo_o");if(!t.hasClass("spin"))t.addClass("spin");else{t.removeClass("spin");setTimeout(function(){t.addClass("spin")},20)}});e(".logo").mouseenter(function(){e(".logo_g").filter(":not(:animated)").animate({marginTop:"40px",opacity:.3},400);e(".logo_g").animate({marginTop:"0",opacity:1},500);e(".logo_k").filter(":not(:animated)").animate({marginLeft:"100px",opacity:.5},300);e(".logo_k").animate({marginLeft:"0",opacity:1},600);e(".logo_a").filter(":not(:animated)").animate({opacity:.3},200);e(".logo_a").animate({opacity:1},600);logoCount++});e(".contact-form_wrapper input[type=submit]").val("SEND");document.createElement("article");document.createElement("section")});