let colored = false;

// Hides any possible jitters while screen loads
window.addEventListener("load", function() {
    $('#overlay').fadeOut(1000, "linear");
});

$(document).ready(function() {
    // This function is meant for any initial animations
    initialSetup();

    // The dropdown in mobile-view
    $('.nav__menuBurger').click(function() {
        if (window.innerWidth < 900) {
            if (!colored) {
                $(".nav").css("background", "#0f1f47");
                $('nav, .nav__button').slideDown(300, "linear");
            } else if (colored) {
                $('nav, .nav__button').slideUp(300, "linear", function() {
                    $(".nav").css("background", "transparent");
                });
            }
            colored = !colored;
        }
    });

    $('.goback').click(function() {
        $('html, body').animate({
            scrollTop: $("#top").offset().top
        }, 800);
    });
});

// Makes sure shit doesn't go haywire if the screen size is arbitrarily changed
$(window).resize(function() {
    // Content height is just the innerwidth of the browser window
    let yOffset = window.pageYOffset;
    let contentHeight = $(window).height();
    $(".nav").css("background", "transparent");
    if (window.innerWidth > 900) {
        $('nav, .nav__button').show();
    } else if (window.innerWidth <= 900) {
        $('nav, .nav__button').hide();
    }
    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }
});

// Handles 'scroll' events, the function 'scrollHandler()' is a few lines ahead
window.onscroll = dedicatedHandler;


function initialSetup() {
    let windowHeight = $(window).height();
    let yOffset = window.pageYOffset;
}

function dedicatedHandler() {
    let windowHeight = $(window).height();
    let yOffset= window.pageYOffset;
    $("body").css("background-size", "cover");
    colored = false;
    $(".nav").css("background", "transparent");
    $('nav, .nav__button').slideUp(300, "linear", function() {
        $(".nav").css("background", "transparent");
    });

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }
}