let navBarColor = "#0f1f47";

// Hides any possible jitters while screen loads
window.addEventListener("load", function() {
    $('div#overlay').fadeOut(1000, "linear");
});

$(document).ready(function() {
    // This function is meant for any initial animations
    initialSetup();

    // The dropdown in mobile-view
    $('.nav__menuBurger').click(function() {
        $('nav, .nav__button').slideToggle(300, "linear");
    });

    $('.goback').click(function() {
        $('html, body').animate({
            scrollTop: $("#top").offset().top
        }, 800);
    });
});

$(window).resize(function() {
    let yOffset = window.pageYOffset;
    if (window.innerWidth > 900) {
        $('nav, .nav__button').show();
    } else if (window.innerWidth <= 900) {
        $('nav, .nav__button').hide();
    }
    colored = false;

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }
});

window.onscroll = scrollHandler;

function initialSetup() {
    let yOffset= window.pageYOffset;

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }
}

function scrollHandler() {
    let yOffset= window.pageYOffset;

    if (window.innerWidth <= 900) {
        $('nav, .nav__button').slideUp(300, "linear");
    }

    if (yOffset >= 20) {
        $(".goback").addClass("in");
    } else if (yOffset < 20) {
        $(".goback").removeClass("in");
    }
}