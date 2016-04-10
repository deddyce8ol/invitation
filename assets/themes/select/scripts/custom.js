$(window).load(function () {

    "use strict";

    //------------------------------------------------------------------------
    //						PRELOADER SCRIPT
    //------------------------------------------------------------------------
    $('#preloader').delay(400).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('#preloader .loading-data').fadeOut(); // will first fade out the loading animation


    //------------------------------------------------------------------------
    //						COUNTER SCRIPT
    //------------------------------------------------------------------------
    // $('.timer').counterUp({
    //     delay: 20,
    //     time: 2500
    // });


    //------------------------------------------------------------------------
    //						COUNTDOWN OPTIONS SCRIPT
    //------------------------------------------------------------------------    
    if ($('div').is('.countdown')) {
        $('.countdown').jCounter({
            date: "14 february 2016 12:00:00", // Deadline date
            timezone: "Europe/Bucharest",
            format: "dd:hh:mm:ss",
            twoDigits: 'on',
            fallback: function () {
                console.log("count finished!")
            }
        });
    }


    //------------------------------------------------------------------------
    //						NAVBAR SLIDE SCRIPT
    //------------------------------------------------------------------------ 		
    $(window).scroll(function () {
        if ($(window).scrollTop() > $("nav").height()) {
            $("nav.navbar-slide").addClass("show-menu");
        } else {
            $("nav.navbar-slide").removeClass("show-menu");
            $(".navbar-slide .navMenuCollapse").collapse({
                toggle: false
            });
            $(".navbar-slide .navMenuCollapse").collapse("hide");
            $(".navbar-slide .navbar-toggle").addClass("collapsed");
        }
    });


    //------------------------------------------------------------------------
    //						NAVBAR HIDE ON CLICK (COLLAPSED) SCRIPT
    //------------------------------------------------------------------------ 		
    $('.nav a').on('click', function () {
        if ($('.navbar-toggle').css('display') != 'none') {
            $(".navbar-toggle").click()
        }
    });

})




$(document).ready(function () {

    "use strict";



    //------------------------------------------------------------------------
    //						ANCHOR SMOOTHSCROLL SETTINGS
    //------------------------------------------------------------------------
    $('a.goto, .navbar .nav a').smoothScroll({
        speed: 1200
    });




    //------------------------------------------------------------------------
    //						FULL HEIGHT SECTION SCRIPT
    //------------------------------------------------------------------------
    $(".screen-height").css("min-height", $(window).height());
    $(window).resize(function () {
        $(".screen-height").css("min-height", $(window).height());
    });



    //------------------------------------------------------------------------------------------
    //                     INITIALIZATION WOW.JS
    //------------------------------------------------------------------------------------------
    var wow = new WOW();
    wow.init();



    //------------------------------------------------------------------------
    //					SUBSCRIBE FORM VALIDATION'S SETTINGS
    //------------------------------------------------------------------------          
    $('#form_perwakilan').validate({
        onfocusout: false,
        onkeyup: false,
        rules: {
            email: {
                required: true,
                email: true
            },
            name: {
                required:true
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest("form"));
        },
        messages: {
            email: {
                required: "Kami memerlukan data email anda untuk konfirmasi kehadiran",
                email: "Email tidak sesuai format"
            },
            name: {
                required: "Nama harus di isi"
            }
        },

        highlight: function (element) {
            $(element)
        },

        success: function (element) {
            element
                .text('').addClass('valid')
        }
    });

});