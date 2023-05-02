





//  var waypoint = new Waypoint({
//   element: document.getElementById('px-offset-waypoint'),
//   handler: function(direction) {
//     notify('I am 20px from the top of the window')
//   },
//   offset: 20 
// })
$( document ).ready(function() {
 
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
       dots: false,
        responsive:{
            0:{
                items:1,
                dots: true
            },
            600:{
                items:3,
                dots: true
            },
            1000:{
                items:5
            }
        }
    })
    var owl = $('.owl-carousel');
    owl.owlCarousel();
// Go to the next item
$('.carousel-control-next-icon').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.carousel-control-prev-icon').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})





 // Add minus icon for collapse element which is open by default
 $(".collapse.show").each(function(){
    $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
});

// Toggle plus minus icon on show hide of collapse element
$(".collapse").on('show.bs.collapse', function(){
    $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
}).on('hide.bs.collapse', function(){
    $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
});

// for table slide
$(".left").click(function(){
    $("#table-slide").carousel("prev");
  });
  $(".right").click(function(){
    $("#table-slide").carousel("next");
  });










// for signup wizard


    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });
    
    $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
    return false;
    })
   

    // main-menu
    
    $('.nav-item').click(function() {
        // alert("hiii");
        $('.nav-item').removeClass('active');
        $(this).addClass('active');  
    });


    // choose plan
    $('.subscription-box').click(function() {
        // alert("hiii");
        $('.subscription-box').removeClass('planselected');
        $(this).addClass('planselected').find('input').prop('checked', true)    
    });


    // payment mode selection
    $('.offline-mode-box').click(function() {
       $('.offline-mode-box').removeClass('active');
        $(this).addClass('active').find('input').prop('checked', true)    
    });

    $('.card-list').click(function() {
       // $('.bank').removeClass('active');
        $(this).addClass('active').find('input').prop('checked', true)    
    });

    $('[data-toggle=search-form]').click(function() {
        $('.search-form-wrapper').toggleClass('open');
        $('.search-form-wrapper .search').focus();
        $('html').toggleClass('search-form-open');
      });
      $('[data-toggle=search-form-close]').click(function() {
        $('.search-form-wrapper').removeClass('open');
        $('html').removeClass('search-form-open');
      });
    $('.search-form-wrapper .search').keypress(function( event ) {
      if($(this).val() == "Search") $(this).val("");
    });
    
    $('.search-close').click(function(event) {
      $('.search-form-wrapper').removeClass('open');
      $('html').removeClass('search-form-open');
    });

    
    
});
// end of document ready


//  print a div
    document.getElementById("doPrint").addEventListener("click", function() {
        var printContents = document.getElementById('printDiv').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
   });





