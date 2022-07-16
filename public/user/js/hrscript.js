$(document).ready(function() {
    "use strict";
	
	// Peloader
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 3000);
	

  //Sticky Nav
		$(".cripto_nav").sticky({ topSpacing: 0 });
  
  //Scroll Spy    
      $('body').scrollspy({ target: '.cripto_nav' })

  //Smoth scroll
    $("nav a").on('click', function(event) {
      if (this.hash !== "") {
       // Prevent default anchor click behavior
       event.preventDefault();

       // Store hash
       var hash = this.hash;

       $('html, body').animate({
       scrollTop: $(hash).offset().top
       }, 1500, function(){
       window.location.hash = hash;
       });
      } // End if
    });

	
	




  // Repeat demo content
  var $body = $('body');
  var $box = $('.box1');
  for (var i = 0; i < 20; i++) {
    $box.clone().appendTo($body);
  }

  // Helper function for add element box list in WOW
  WOW.prototype.addBox = function(element) {
    this.boxes.push(element);
  };

  // Init WOW.js and get instance
  var wow = new WOW();
  wow.init();

  // Attach scrollSpy to .wow elements for detect view exit events,
  // then reset elements and add again for animation
  $('.wow').on('scrollSpy:exit', function() {
    $(this).css({
      'visibility': 'hidden',
      'animation-name': 'none'
    }).removeClass('animated');
    wow.addBox(this);
  }).scrollSpy();








     

});
