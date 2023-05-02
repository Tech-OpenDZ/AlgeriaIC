$(document).ready(function() {

    $('.navbar-toggler').click( function() {
        $(".menu_wrap").toggleClass("mobile_hamburger");
        $("header").toggleClass("menu_open");
        $(this).toggleClass("close_css");
        $("body").toggleClass("menu_opened");
    });

    $('.drop-ar-down').click( function() {
        $(this).toggleClass("swap_minus");
    });



    // edited owl carousel for home page

    var partnerCarousel = $(".our-partners");

    partnerCarousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            600: {
                items: 3,
                dots: true
            },
            1000: {
                items: 5
            }
        }
    });

    $(".partner-next-btn").click(function() {
        partnerCarousel.trigger("next.owl.carousel");
    });

    $(".partner-prev-btn").click(function() {
        partnerCarousel.trigger("prev.owl.carousel");
    });

    // Partner Second Carousel
    var otherPartnerCarousel = $(".partners-clients-logo");

    otherPartnerCarousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            600: {
                items: 3,
                dots: true
            },
            1000: {
                items: 5
            }
        }
    });

    $(".partner-logo-next-btn").click(function() {
        otherPartnerCarousel.trigger("next.owl.carousel");
    });

    $(".partner-logo-prev-btn").click(function() {
        otherPartnerCarousel.trigger("prev.owl.carousel");
    });

    // for events carousel event page
    // Partner Second Carousel
    var upcomingevents = $(".upcoming-events-slider");

    upcomingevents.owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            400: {
                items: 3,
                dots: true
            },
            600: {
                items: 4,
                dots: true
            },
            1000: {
                items: 6
            }
        }
    });

    $(".events-next-btn").click(function() {
        upcomingevents.trigger("next.owl.carousel");
    });

    $(".events-prev-btn").click(function() {
        upcomingevents.trigger("prev.owl.carousel");
    });

    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function() {
        $(this)
            .prev(".card-header")
            .find(".fa")
            .addClass("fa-minus")
            .removeClass("fa-plus");
    });

    // Toggle plus minus icon on show hide of collapse element
    $(".collapse")
        .on("show.bs.collapse", function() {
            $(this)
                .prev(".card-header")
                .find(".fa")
                .removeClass("fa-plus")
                .addClass("fa-minus");
        })
        .on("hide.bs.collapse", function() {
            $(this)
                .prev(".card-header")
                .find(".fa")
                .removeClass("fa-minus")
                .addClass("fa-plus");
        });

    // for table slide
    // $(".left").click(function(){
    // $("#table-slide").carousel("prev");
    // });
    //   $(".right").click(function(){
    //     $("#table-slide").carousel("next");
    // });

    // for signup wizard

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function() {
        current_fs = $(this).parent();
        next_fs = $(this)
            .parent()
            .next();

        //Add Class Active
        $("#progressbar li")
            .eq($("fieldset").index(next_fs))
            .addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        display: "none",
                        position: "relative"
                    });
                    next_fs.css({ opacity: opacity });
                },
                duration: 600
            }
        );
    });

    $(".previous").click(function() {
        current_fs = $(this).parent();
        previous_fs = $(this)
            .parent()
            .prev();

        //Remove class active
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        display: "none",
                        position: "relative"
                    });
                    previous_fs.css({ opacity: opacity });
                },
                duration: 600
            }
        );
    });

    $(".radio-group .radio").click(function() {
        $(this)
            .parent()
            .find(".radio")
            .removeClass("selected");
        $(this).addClass("selected");
    });

    $(".submit").click(function() {
        return false;
    });

    // main-menu

    $(".nav-item").click(function() {
        // alert("hiii");
        $(".nav-item").removeClass("active");
        $(this).addClass("active");
    });

    // choose plan
    $(".subscription-box").click(function() {
        // alert("hiii");
        $(".subscription-box").removeClass("planselected");
        $(this)
            .addClass("planselected")
            .find("input")
            .prop("checked", true);
    });

    // payment mode selection
    $(".offline-mode-box").click(function() {
        $(".offline-mode-box").removeClass("active");
        $(this)
            .addClass("active")
            .find("input")
            .prop("checked", true);
    });

    $(".card-list").click(function() {
        // $('.bank').removeClass('active');
        $(this)
            .addClass("active")
            .find("input")
            .prop("checked", true);
    });

    $("[data-toggle=search-form]").click(function() {
        $(".search-form-wrapper").toggleClass("open");
        $(".search-form-wrapper .search").focus();
        $("html").toggleClass("search-form-open");
    });
    $("[data-toggle=search-form-close]").click(function() {
        $(".search-form-wrapper").removeClass("open");
        $("html").removeClass("search-form-open");
    });
    $(".search-form-wrapper .search").keypress(function(event) {
        if ($(this).val() == "Search") $(this).val("");
    });

    $(".search-close").click(function(event) {
        $(".search-form-wrapper").removeClass("open");
        $("html").removeClass("search-form-open");
    });

    //   for business directory wizard
    var navListItems = $("div.setup-panel div a"),
        allWells = $(".setup-content"),
        allNextBtn = $(".nextBtn");

    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr("href")),
            $item = $(this);

        if (!$item.hasClass("disabled")) {
            // navListItems.removeClass('btn-primary').addClass('btn-default');
            navListItems.addClass("btn-default");
            $item.addClass("btn-primary");
            allWells.hide();
            $target.show();
            $target.find("input:eq(0)").focus();
        }
    });

    allNextBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $(
                'div.setup-panel div a[href="#' + curStepBtn + '"]'
            )
                .parent()
                .next()
                .children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        if (isValid) nextStepWizard.removeClass("disabled").trigger("click");
    });

    $("div.setup-panel div a.btn-primary").trigger("click");

    // select 2
    $(".multi-choice").select2();
    $("#selectoption").click(function() {
        $(".multi-choice > option").prop("selected", "selected");
        $(".multi-choice").trigger("change");
    });
    $("#deselectoption").click(function() {
        $(".multi-choice > option").prop("selected", false);
        $(".multi-choice").trigger("change");
    });
});
// end of document ready

$(document).ready(function() {
    // if (window.File && window.FileList && window.FileReader) {
    //     $("#files").on("change", function(e) {
    //         var files = e.target.files,
    //             filesLength = files.length;
    //         for (var i = 0; i < filesLength; i++) {
    //             var f = files[i];
    //             var fileReader = new FileReader();
    //             fileReader.onload = function(e) {
    //                 var file = e.target;
    //                 $(
    //                     '<span class="pip">' +
    //                         '<img class="imageThumb" src="' +
    //                         e.target.result +
    //                         '" title="' +
    //                         file.name +
    //                         '"/>' +
    //                         '<br/><span class="remove">Remove</span>' +
    //                         "</span>"
    //                 ).insertBefore(".preview-img-section");
    //                 $(".remove").click(function() {
    //                     $(this)
    //                         .parent(".pip")
    //                         .remove();
    //                 });
    //             };
    //             fileReader.readAsDataURL(f);
    //         }
    //     });
    // } else {
    //     alert("Your browser doesn't support to File API");
    // }

    // for language

    $(".lang-flag").click(function() {
        $(".language-dropdown").toggleClass("open");
    });
    $("ul.lang-list li").click(function() {
        $("ul.lang-list li").removeClass("selected");
        $(this).addClass("selected");
        if ($(this).hasClass("lang-en")) {
            $(".language-dropdown")
                .find(".lang-flag")
                .addClass("lang-en")
                .removeClass("lang-es")
                .removeClass("lang-pt");
            $("#lang_selected").html("<p>EN</p>");
        } else if ($(this).hasClass("lang-pt")) {
            $(".language-dropdown")
                .find(".lang-flag")
                .addClass("lang-pt")
                .removeClass("lang-es")
                .removeClass("lang-en");
            $("#lang_selected").html("<p>PT</p>");
        } else {
            $(".language-dropdown")
                .find(".lang-flag")
                .addClass("lang-es")
                .removeClass("lang-en")
                .removeClass("lang-pt");
            $("#lang_selected").html("<p>ES</p>");
        }
        $(".language-dropdown").removeClass("open");
    });

    // for admin user updates
    // $("#remove-edit").click(function(){
    //   $(".remove-plan").show();
    // });
    $("#main-user").click(function() {
        var name = $(".edit-name").text();
        $(".edit-name").html("");
        $("<input></input>")
            .attr({
                type: "text",
                name: "name",
                id: "input-fullname",
                class: "form-control",
                size: "20",
                value: name
            })
            .appendTo(".edit-name");
        $("#input-fullname").focus();
    });

    // job title
    $("#job-title").click(function() {
        var title = $(".edit-wev-devmanager").text();
        $(".edit-wev-devmanager").html("");
        $("<input></input>")
            .attr({
                type: "text",
                name: "job_title",
                id: "input-devmanager",
                class: "form-control",
                size: "20",
                value: title
            })
            .appendTo(".edit-wev-devmanager");
        $("#input-devmanager").focus();
    });

    // username
    $("#user-name").click(function() {
        var title = $(".edit-username").text();
        $(".edit-username").html("");
        $("<input></input>")
            .attr({
                type: "text",
                name: "username",
                id: "input-username",
                class: "form-control",
                size: "20",
                value: title
            })
            .prependTo(".parent-edit-username");
        $("#input-username").focus();
    });

    // email

    $("#user-email").click(function() {
        var email = $(".edit-user-email").text();
        $(".edit-user-email").html("");
        $("<input></input>")
            .attr({
                type: "text",
                name: "email",
                id: "input-email",
                class: "form-control",
                size: "20",
                value: email
            })
            .appendTo(".edit-user-email");
        $("#input-email").focus();
    });

    //phone
    $("#user-phone").click(function() {
        var phone = $(".edit-user-phone").text();
        $(".edit-user-phone").html("");
        $("<input></input>")
            .attr({
                type: "text",
                name: "phone",
                id: "input-phone",
                class: "form-control",
                size: "20",
                value: phone
            })
            .appendTo(".edit-user-phone");
        $("#input-phone").focus();
    });
    $("#user-pass").click(function() {
        $(".pass-set").show();
    });

    // for header top toggle
    $(".timming-toggle").click(function(){
        $(".mobile-clock").toggle();
      });

    // for menu test part 
    $('.main-navigation li.dropdown').on('click', function() {
        var $el = $(this);
        // if ($el.hasClass('open')) {
            var $a = $el.children('a.dropdown-toggle');
            if ($a.length && $a.attr('href')) {
                location.href = $a.attr('href');
            }
        // }
    }); 

    $('#discover-al').on('click', function(e) {
        var id_name = $('#dr-al-1').length;
        if(id_name){
            $('#dr-al-1').css('display',"none");
            $('#dr-al-1').attr('id','dr-al');
        }else{
            $('#dr-al').css('display',"");
            $('#dr-al').attr('id','dr-al-1');
        }
        e.stopPropagation();
    });
   
    $('#discover-re').on('click', function(e) {
        var id_name = $('#dr-re-1').length;
        if(id_name){
            $('#dr-re-1').css('display',"none");
            $('#dr-re-1').attr('id','dr-re');
        }else{
            $('#dr-re').css('display',"");
            $('#dr-re').attr('id','dr-re-1');
        }
        e.stopPropagation();
    });
    $('#discover-ne').on('click', function(e) {
        var id_name = $('#dr-ne-1').length;
        if(id_name){
            $('#dr-ne-1').css('display',"none");
            $('#dr-ne-1').attr('id','dr-ne');
        }else{
            $('#dr-ne').css('display',"");
            $('#dr-ne').attr('id','dr-ne-1');
        }
        e.stopPropagation();
    });
    $('#discover-ev').on('click', function(e) {
        var id_name = $('#dr-ev-1').length;
        if(id_name){
            $('#dr-ev-1').css('display',"none");
            $('#dr-ev-1').attr('id','dr-ev');
        }else{
            $('#dr-ev').css('display',"");
            $('#dr-ev').attr('id','dr-ev-1');
        }
        e.stopPropagation();
    });
    $('#discover-bd').on('click', function(e) {
        var id_name = $('#dr-bd-1').length;
        if(id_name){
            $('#dr-bd-1').css('display',"none");
            $('#dr-bd-1').attr('id','dr-bd');
        }else{
            $('#dr-bd').css('display',"");
            $('#dr-bd').attr('id','dr-bd-1');
        }
        e.stopPropagation();
    });
    // for menu test part  ends
    // focus to next field
    var count = 1;
    $("#new-pass").on("keyup", function(e) {
        if (e.which == 13) {
            count = 1;
        }
    });
    $(".user-pass-field").on("keyup", function(e) {
        if (e.which == 13 && count == 1) {
            // alert("hii");
            console.log($(this).attr("id"));
            count++;
            if ($(this).attr("id") == "old-pass") {
                $("#new-pass").focus();
            }
            if ($(this).attr("id") == "new-pass") {
                $("#cnf-pass").focus();
            }
        }
    });
});

//     document.getElementById("doPrint").addEventListener("click", function() {
//         var printContents = document.getElementById('printDiv').innerHTML;
//         var originalContents = document.body.innerHTML;
//         document.body.innerHTML = printContents;
//         window.print();
//         document.body.innerHTML = originalContents;
//    });
