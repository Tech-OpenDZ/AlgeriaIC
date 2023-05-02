


$( document ).ready(function() {
 
// edited owl carousel for home page

var partnerCarousel = $('.our-partners');

partnerCarousel.owlCarousel({
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
});

$(".partner-next-btn").click(function() {
    partnerCarousel.trigger('next.owl.carousel');
});

$(".partner-prev-btn").click(function() {
    partnerCarousel.trigger('prev.owl.carousel');
});


// Partner Second Carousel
var otherPartnerCarousel = $('.partners-clients-logo');

otherPartnerCarousel.owlCarousel({
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
});

$(".partner-logo-next-btn").click(function() {
    otherPartnerCarousel.trigger('next.owl.carousel');
});

$(".partner-logo-prev-btn").click(function() {
    otherPartnerCarousel.trigger('prev.owl.carousel');
});


// for events carousel event page
// Partner Second Carousel
var upcomingevents = $('.upcoming-events-slider');

upcomingevents.owlCarousel({
    loop:true,
    margin:10,
    dots: false,
    responsive:{
        0:{
            items:2,
            dots: true
        },
        400:{
            items:3,
            dots: true
        },
        600:{
            items:4,
            dots: true
        },
        1000:{
            items:6
        }
    }
});

$(".events-next-btn").click(function() {
    upcomingevents.trigger('next.owl.carousel');
});

$(".events-prev-btn").click(function() {
    upcomingevents.trigger('prev.owl.carousel');
});

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

//   for business directory wizard
var navListItems = $('div.setup-panel div a'),
allWells = $('.setup-content'),
allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
e.preventDefault();
var $target = $($(this).attr('href')),
    $item = $(this);

if (!$item.hasClass('disabled')) {
// navListItems.removeClass('btn-primary').addClass('btn-default');
navListItems.addClass('btn-default');
$item.addClass('btn-primary');
allWells.hide();
$target.show();
$target.find('input:eq(0)').focus();
}
});

allNextBtn.click(function(){
var curStep = $(this).closest(".setup-content"),
curStepBtn = curStep.attr("id"),
nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
curInputs = curStep.find("input[type='text'],input[type='url']"),
isValid = true;



if (isValid)
nextStepWizard.removeClass('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');

    
});
// end of document ready

$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">Remove</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });
            
            // Old code here
            /*$("<img></img>", {
              class: "imageThumb",
              src: e.target.result,
              title: file.name + " | Click to remove"
            }).insertAfter("#files").click(function(){$(this).remove();});*/
            
          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }

    // for language
   
      $(".lang-flag").click(function () {
          $(".language-dropdown").toggleClass("open");
      });
      $("ul.lang-list li").click(function () {
          $("ul.lang-list li").removeClass("selected");
          $(this).addClass("selected");
          if ($(this).hasClass('lang-en')) {
              $(".language-dropdown").find(".lang-flag").addClass("lang-en").removeClass("lang-es").removeClass("lang-pt");
              $("#lang_selected").html("<p>EN</p>")
          } else if ($(this).hasClass('lang-pt')) {
              $(".language-dropdown").find(".lang-flag").addClass("lang-pt").removeClass("lang-es").removeClass("lang-en");
              $("#lang_selected").html("<p>PT</p>")
          } else {
              $(".language-dropdown").find(".lang-flag").addClass("lang-es").removeClass("lang-en").removeClass("lang-pt");
              $("#lang_selected").html("<p>ES</p>")
          }
          $(".language-dropdown").removeClass("open");
      });
  
  });


 
//     document.getElementById("doPrint").addEventListener("click", function() {
//         var printContents = document.getElementById('printDiv').innerHTML;
//         var originalContents = document.body.innerHTML;
//         document.body.innerHTML = printContents;
//         window.print();
//         document.body.innerHTML = originalContents;
//    });





