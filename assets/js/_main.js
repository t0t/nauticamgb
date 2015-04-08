(function($) {
    $(function() {


// $(function(){
//   $( "div.team" ).bind( "tap", tapHandler );
 
//   function tapHandler( event ){
//     $( event.target ).addClass( "tap" );
//   }
// });



//http://jsbin.com/boreme/17/edit?html,css,js,output
// $(window).scroll(function() {
// var scroll = $(window).scrollTop();
// if (scroll >= 30) {
// $(".brand").addClass("encoge");
// } else {
// $(".brand").removeClass("encoge");
// }
// });

// Hide Header on on scroll down
//http://jsfiddle.net/mariusc23/s6mLJ/31/
// var didScroll;
// var lastScrollTop = 0;
// var delta = 5;
// var navbarHeight = $('header').outerHeight();

// $(window).scroll(function(event){
//     didScroll = true;
// });

// setInterval(function() {
//     if (didScroll) {
//         hasScrolled();
//         didScroll = false;
//     }
// }, 250);

// function hasScrolled() {
//     var st = $(this).scrollTop();
    
//     // Make sure they scroll more than delta
//     if(Math.abs(lastScrollTop - st) <= delta)
//         return;
    
//     // If they scrolled down and are past the navbar, add class .brand--show.
//     // This is necessary so you never see what is "behind" the navbar.
//     if (st > lastScrollTop && st > navbarHeight){
//         // Scroll Down
//         $('header').removeClass('brand--show').addClass('brand--hide');
//     } else {
//         // Scroll Up
//         if(st + $(window).height() < $(document).height()) {
//             $('header').removeClass('brand--hide').addClass('brand--show');
//         }
//     }
    
//     lastScrollTop = st;
// }

// touch
// http://www.w3schools.com/jquerymobile/event_tap.asp
// http://www.w3schools.com/jquerymobile/tryit.asp?filename=tryjqmob_event_tap_function
// $(document).on("pagecreate","#pageone",function(){
//   $("p").on("tap",function(){
//     $(this).hide();
//   });                       
// });




  // function addScrollTopAnimation() {
      
  //   var $scrolltop_link = $('.scroll-top');

  //   $scrolltop_link.on( 'click' , function(ev) {
      
  //     ev.preventDefault();
      
  //     $( 'html, body' ).animate( {
        
  //       scrollTop: 0
        
  //     }, 700 );
      
  //   })
    
  //   // Hides the link initially
  //   .data('hidden', 1).hide(); 
    
  //   var scroll_event_fired = false;
    
  //   $(window).on('scroll', function() {
      
  //     scroll_event_fired = true;
      
  //   });
    
    /* 
    Checks every 300 ms if a scroll event has been fired.
    */
  //   setInterval( function() {
          
  //     if( scroll_event_fired ) {
        
  //       /* 
  //       Stop code below from being executed until the next scroll event. 
  //       */
  //       scroll_event_fired = false; 
        
  //       var is_hidden =  $scrolltop_link.data('hidden'); 
        
  //       /* 
  //       Display the scroll top link when the page is scrolled 
  //       down the height of half a viewport from top,  Hide it otherwise. 
  //       */
  //       if ( $( this ).scrollTop()  >  $( this ).height() / 2 ) {
          
  //         if( is_hidden ) {
            
  //           $scrolltop_link.fadeIn(1200).data('hidden', 0);
            
  //         }
  //       }
        
  //       else {
          
  //         if( !is_hidden ) {
            
  //           $scrolltop_link.slideUp().data('hidden', 1);
      
  //         }
  //       }
        
  //     }
      
  //   }, 300); 
    
  // }

  // addScrollTopAnimation(); // start 


// Slider
// $('.slider__item:nth-child(3)').addClass('current');

// $('.slider__btn-next').on('click', function (e) {

//     e.preventDefault();

//     if ($('.current').next().length === 0) {
//         $('.slider__item').removeClass('current').first().addClass('current');
//         return;
//     }
//     $('.current').removeClass('current').next().addClass('current'); 

// });


// $('.slider__btn-prev').on('click', function (e) {
  
//     e.preventDefault();

//     if ($('.current').prev().length === 0) {
//         $('.slider__item').removeClass('current').last().addClass('current');
//         return;
//     }
//     $('.current').removeClass('current').prev().addClass('current');

// });




    // $( '#close' ).on( "click", function(e) {
    //     e.preventDefault();
    //     $(this).parent('div').remove();
    // });







    });
})(jQuery);
